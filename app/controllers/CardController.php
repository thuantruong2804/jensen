<?php
class CardController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Card $card, Email $email) {
        parent::__construct();
        $this->card = $card;
        $this->email = $email;
    }
    
    /**
     * list all card
     * @author Thuan Truong
     * @return responses
     */
    public function index() {
        $input = array_map('trim', Input::all());
        
        $cards = $this->card->searchCard($input);
        $totalRecords = $this->card->getTotalRecords($input);
        $currentAccount = BaseController::getAccountInfo();
        
        if (isset($input['export']) && $input['export'] == 'true') {
            $this->exportExcel($cards);
        }

        $view = View::make('card.index')->with(array(
            'cards' => $cards,
            'totalRecords' => $totalRecords,
            'currentAccount' => $currentAccount,
            'input' => $input
        ));
        
        $this->layout->content = $view;
    }
    
    
    /**
     * create view and store
     * @author Thuan Truong
     */
    public function create() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->lab->validate($input);
            if ($validator->passes()) {
                $this->lab->saveLab($input);
                Session::flash('f_notice', 'Tạo mới lab thành công');
                return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => URL::to('/admin/lab')));
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('lab.create')->with(array(
            ));
            
            $this->layout->content = $view;
        }
        
    }

    /**
     * Import Card File
     * @author Thuan Truong
     * @since 2016-05-05
     */
    public function import(){
        $input = Input::all();
        $message = '';

        if (isset($_FILES['data_file'])) {
            if (!empty($_FILES['data_file']['name'])) {
                if($_FILES['data_file']['error'] == 0) {
                    $extension = pathinfo($_FILES['data_file']['name'], PATHINFO_EXTENSION);
                    $allowExtention = array('xlsx', 'xls');

                    if (in_array(strtolower($extension), $allowExtention)) {
                        if ($_FILES['data_file']['size'] <= 20971520) {
                            $current_time = date('YmdHis');
                            $savePath = public_path().'/'.$current_time.'.'.$extension;
                            if(move_uploaded_file($_FILES['data_file']['tmp_name'], $savePath)) {
                                $message = $this->handleDataFile($savePath, $input);
                                if ($message == '') {
                                    Session::flash('f_notice', 'Cập nhật thẻ bảo hành thành công');
                                    return Redirect::to('/admin/card');
                                } else {
                                    Session::flash('f_error', 'Cập nhật thẻ thất bại');
                                    return Redirect::to('/admin/card');
                                }
                            } else {
                                $message = 'Có lỗi trong quá trình tải file';
                            }
                        } else {
                            $message = 'Kích thước file phải dưới 20MB';
                        }
                    } else {
                        $message = 'File không đúng định dạng';
                    }
                } else {
                    $message = 'File bị lỗi';
                }
            } else {
                $message = 'Chưa chọn file';
            }
        } else {
            return Redirect::to('/admin/card');
        }
        Session::flash('f_error', $message);
        return Redirect::to('/admin/card');
    }


    /**
     * Handle Data File
     * @author Thuan Truong
     * @since 2016-05-05
     */
    public function handleDataFile($filePath, $input) {
        $message = '';

        $excelData = array();

        Excel::load($filePath, function($reader) use (&$excel, $excelData, $input, &$message) {
            $objExcel = $reader->getExcel();
            $sheet = $objExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            // Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++) {
                // Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $excelData[] = $rowData[0];
            }
            $checkFail = false;

            if (!empty($excelData)) {
                if (!$checkFail) {

                    // check trans valid date
                    $countRows = 0;
                    foreach($excelData as $data) {
                        $countRows++;
                        $cardNo = trim($data[0]);
                        $cardName = trim($data[1]);
                        $doctor = trim($data[2]);
                        $lab = trim($data[3]);
                        $position = trim($data[4]);
                        $sl = trim($data[5]);
                        $release = trim($data[6]);
                        $expire = trim($data[7]);

                        if (empty($cardNo))
                            continue;
                        if (empty($cardNo) || empty($cardName) || empty($release) || empty($expire)) {
                            $checkFail = true;
                            break;
                        }

                        $cardCheck = Card::whereRaw('card_no = ?', [$cardNo])->first();
                        if ($cardCheck) {
                            $checkFail = true;
                            break;
                        }

                        $card = new Card();
                        $card->card_no = mb_strtoupper($cardNo);
                        $card->card_name = mb_strtoupper($cardName);
                        $card->doctor = mb_strtoupper($doctor);
                        $card->lab = mb_strtoupper($lab);
                        $card->position = $position;
                        $card->sl = $sl;
                        $card->release = date('Y-m-d 00:00:00', ($release-25567-2)*24*60*60);
                        $card->expire = date('Y-m-d 00:00:00', ($expire-25567-2)*24*60*60);
                        $card->save();

                    }

                    if ($checkFail) {
                        $message = 'Cập nhật thẻ thất bại';

                    }

                }

            }
        });
        unlink($filePath);
        return $message;
    }

    /**
     * Export Excel 
     * @author Thuan Truong
     */
    public function exportExcel($cards) {
        Excel::create('DANHSACHTHE_'.date('dmY'), function($excel) use($cards) {
            $excel->sheet('CHITIET', function($sheet) use($cards) {
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Times New Roman',
                        'size'      =>  11,
                        'bold'      =>  false,
                    )
                ));     
                 
                // insert header
                $sheet->row( 1, array(
                    'STT',
                    'So_the',
                    'Ten_KH',
                    'Phong_kham',
                    'Labo',
                    'Vi_tri_rang',
                    'SL',
                    'Ngay_PH',
                    'BH_den_ngay',
                ));
                
                $sheet->row(1, function($row) {
                    $row->setFontWeight('bold');
                    $row->setFontSize(11);
                });
                
                
                // insert data
                $rows = 1;
                foreach($cards as $card) {
                    $rows ++;
                    
                    $sheet->row( $rows, array(
                         $rows - 1,
                         $card->card_no,
                         mb_strtoupper($card->card_name),
                         mb_strtoupper($card->doctor),
                         mb_strtoupper($card->lab),
                         mb_strtoupper($card->position),
                         $card->sl,
                         date('d/m/Y', strtotime($card->release)),
                         date('d/m/Y', strtotime($card->expire)),
                    ));
                }
                
                $sheet->setBorder('A1:I'.$rows, 'thin');   
                $sheet->setColumnFormat(array(
                    //'D6:D'.$rows => '@',
                ));
            });
        })->download('xlsx');
        
    }


    /**
     * edit view and update
     * @author Thuan Truong
     */
    public function edit($id) {
        $card = Card::find($id);
        if(empty($card)) Redirect::to('/admin/card');
        
        $input = Input::all();
        if (!empty($input)) {
            $validator = $this->card->validate($input);
            if ($validator->passes()) {
                $this->card->updateCard($input, $id);
                Session::flash('f_notice', 'Sửa thông tin thẻ thành công');
                return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('admin.card')));
            } else {
                return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('card.edit')->with(array(
                'card' => $card,
            ));
            $this->layout->content = $view;
        }
        
    }

    /**
     * Update Status role: Publish or unpublish
     * @param integr $id: ID of role
     * @param integer $status: 0 is unpublish, 1 is publish
     * @return json response
     */
    public function status($id) {
        $card = Card::find($id);
        
        if (!empty($card)) {
            $status = $card->status;
            $card->status = 0;
            if (!$status) {
                $card->status = 1;
            }
            $card->update();

            Session::flash('f_notice', !$card->status  ? 'Thẻ bảo hành đã được bỏ duyệt thành công' : 'Thẻ bảo hành đã được duyệt thành công');
            return Response::json(array(
                'status' => 1,
                'href' => URL::to('/admin/card'),
            ));
        } else {
            return Redirect::action('CardController@index')->with('f_notice', '');
        }
    }
    
    /**
     * Delete Card 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function delete($id) {
        $card = Card::find($id);
        if (empty($card)) {
            return Redirect::action('CardController@index');
        }
        Card::destroy($id);
        
        Session::flash('f_notice', 'Thẻ bảo hành đã được xóa thành công');
        return Response::json(array(
            'status' => 1,
            'href' => URL::to('/admin/card'),
        ));
    }

    
    /**
     * Send mail called by cronjob
     * Set up command to run url: '/sendMail'
     */
    public function sendMail() {
        $this->email->trackingSendEmail();
        return Response::json(array('status' => 1));
    }
}
