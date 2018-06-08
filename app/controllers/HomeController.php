<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.admin';
    public function __construct(Account $account, Media $media) {
        parent::__construct();
        $this->account = $account;
        $this->media = $media;
    }
    

    /**
     * show page login (admin)
     * @author Thuan Truong
     */
    public function loginAdminAccount() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->account->validateCredentials($input);
            if ($validator->passes()) {
                $account = $this->account->checkLogin($input['username'], $input['password']);
                if ($account instanceof Account) {
                    if (isset($input['remember']) && $input['remember'] == 1) {
                        setcookie('username', $input['username'], time()+3600*24*30);
                        setcookie('password', $input['password'], time()+3600*24*30);
                    }
                    Session::put('auth', $account->ID);
                    return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('admin.account')));
                } else {
                    return Response::json(array('status' => 0, 'code' => 'corect',  'message' => 'Tài khoản hoặc mật khẩu không đúng'));
                }
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.login');
            $view = View::make('admin.login')->with(array());
            
            $this->layout->content = $view;
        }
        
    }


    /**
     * show admin dashboard 
     * @author Thuan Truong
     */
    public function adminDashboard() {
        $input = array_map('trim', Input::all()); 
        
        $view = View::make('admin.dashboard')->with(array(
            'currentAccount' => BaseController::getAccountInfo(),
        ));
        $this->layout->content = $view;
    }

    
    /**
     * show home
     * @author Thuan Truong
     */
    public function index() {
        $input = array_map('trim', Input::all());

        Session::put('title', 'Grand Theft Auto Vietnamese Community');
        Session::put('description', 'Cộng đồng Grand Theft Auto - San Andreas tại Việt Nam. Máy chủ chính thức với IP: GVC.WTF:7777. Bạn sẽ được trải nghiệm qua tất cả nhân vật trong cuộc sống thực tế để có thể phô diễn khả năng của chúng ta cho mọi người xem. Tất cả mọi thứ đã có trong GvC , bạn hãy vào để giao lưu , làm quen với mọi người nào !');
        Session::put('image', Asset('assets/images/banner-bg-1.png'));
        Session::put('url', URL::to('/'));
        
        $this->layout = View::make('layouts.application');
        $view = View::make('home.index')->with(array(

        ));
        $this->layout->content = $view;
    }

    /**
     * show home
     * @author Thuan Truong
     */
    public function dailydiscount() {
        DB::table('zz_discounts')->whereRaw('Discount_Exprire_Date < ? and Discount_Status = 1', [date('Y-m-d')])->update(array('Discount_Status' => 0));
        DB::table('zz_vouchers')->whereRaw('Voucher_Expire_Date < ? and Voucher_Status = 0', [date('Y-m-d')])->update(array('Voucher_Status' => 1));
        return Response::json(array('status' => 1));
    }

    /**
     * show home
     * @author Thuan Truong
     */
    public function serverinfo() {
        include('infosv.php');
        $serverIP = "112.213.84.173";
        $serverPort = 7777;

        try
        {
            $rQuery = new QueryServer( $serverIP, $serverPort );

            $aInformation = $rQuery->GetInfo( );
            $aServerRules = $rQuery->GetRules( );
            $aBasicPlayer = $rQuery->GetPlayers( );
            $aTotalPlayers = $rQuery->GetDetailedPlayers( );

            $rQuery->Close( );
        }
        catch (QueryServerException $pError)
        {

        }

        $this->layout = View::make('layouts.application');
        if(isset($aInformation) && is_array($aInformation)){
            $view = View::make('home.infosv')->with(array(
                'aInformation' => $aInformation,
                'aServerRules' => $aServerRules,
                'aBasicPlayer' => $aBasicPlayer,
                'aTotalPlayers' => $aTotalPlayers
            ));
        } else {
            $view = View::make('home.infosv')->with(array());
        }
        $this->layout->content = $view;
    }

    /**
     * show home
     * @author Thuan Truong
     */
    public function analytic() {
        $input = array_map('trim', Input::all());
        $query = Statics::query();
        $statics = null;

        $query->select('*');
        if (!empty($input)) {
            if (!empty($input['start_date'])) {
                $currentDate = DateTime::createFromFormat('d-m-Y', $input['start_date'])->format('Y-m-d');
                $query->where('Date', '>=', $currentDate);
            }
            if (!empty($input['end_date'])) {
                $currentDate = DateTime::createFromFormat('d-m-Y', $input['end_date'])->format('Y-m-d');
                $query->where('Date', '<=', $currentDate);
            }

        } else {
            $monthAgoDate = date('Y-m-d');
            $query->where('Date', '>=', date("Y-m-d", strtotime("-30 days")));
        }
        $query->orderBy('Date', 'desc');
        $query->offset(0)->limit(15);
        $statics = $query->orderBy('Date', 'asc')->get();


        $countMale = Character::whereRaw('Gender = 1')->count();
        $countFeMale = Character::whereRaw('Gender = 2')->count();

        $this->layout = View::make('layouts.application');
        $view = View::make('home.static')->with(array(
            'statics' => $statics,
            'male' => $countMale,
            'female' => $countFeMale,
            'input' => $input
        ));
        $this->layout->content = $view;
    }
    
    
    /**
     * Upload image for CKeditor
     * @author Duc Nguyen
     */
    public function ckeditorImage() {
        $result = array();
        $file = Input::file('upload');
        $mime = strstr($file->getClientMimeType(), '/', true);
        if($mime == 'image') {
            $path = Config::get('config.urlCkeditorUpload');
            $random  = md5(uniqid());
            $extension  = $file->getClientOriginalExtension();
            $filename   = $random.'.'.$extension;
            if($file->move(public_path(). '/'. $path, $filename)) {
                $url = url($path. '/'. $filename);
            } else {
                $result['error'] = 'Unable to insert image.';
            }
        } else {
            $result['error'] = 'This is not an image.';
        }
        $funcNum = Input::get('CKEditorFuncNum') ;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
    
    /**
     * Delete media
     * @author Duc Nguyen 
     */
    public function deleteMedia($id) {
        $result = array(
            'status' => 1,
        );
        $media = $this->media->find($id);
        $media->is_deleted = 1;
        $media->save();
        return Response::json($result);
    }
    
    /**
     * Upload Image
     * Use Jquery File Uploader
     * 
     * http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/
     * 
     * @author Thuan Truong
     */
    public function upload() {
        $result = array(
            'status' => 'error'
        );
        $current_time = date('YmdHis');
        // A list of permitted file extensions
        $allowed_image = Config::get('config.uploader.allowed_image');
        $allowed_file = Config::get('config.uploader.allowed_file');
        
        $extension_image = Config::get('config.uploader.image_extension');
        
        if(empty($_FILES)) {
            $result['message'] = 'Please upload file less than 3Mb';
        }
        
        if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
            $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
            $name_file = explode('.', $_FILES['upl']['name']);
            $name_file = $name_file[0];
            $name_file_origin = $name_file;
            
            $name_file = uniqid(rand(), true);
            
            $file_size = $_FILES['upl']['size']; 
            
            $check_validate = true;
            $format_upl = Input::get('format_upl', '');
            if ($format_upl == 'image' && !in_array(strtolower($extension), $allowed_image)) {
                $result['message'] = Lang::get('validation.custom.invalid_image_format');
                $check_validate = false;
            }
            if ($format_upl == 'file' && !in_array(strtolower($extension), $allowed_file)) {
                $result['message'] = Lang::get('validation.custom.invalid_file_format');
                $check_validate = false;
            }
            if ($format_upl != 'file' && $format_upl != 'image') {
                $check_validate = false;
            }
            if (!$check_validate) {
                return Response::json($result);
            }
            
            // Initial media
            $media = new Media();
            $media->name = $name_file;
            $media->extension = $extension;
            $media->file_size = $file_size;
            
            if (in_array(strtolower($extension), $extension_image)) {
                $media->type = Config::get('config.media_type.image');
            } else {
                $media->type = Config::get('config.media_type.file');
            }
            
            $check_validate = false;    
            if (in_array(strtolower($extension), $allowed_image)) {
                /*
                 * If image then generate thumbnail, medium image
                * thumbnail: 200x200
                * medium: 640x640
                * original: 1200x1200
                */
                $new_path = public_path().Config::get('config.path_upload_image').'/original/'.$name_file.'_'.$current_time.'.'.$extension;
                if(move_uploaded_file($_FILES['upl']['tmp_name'], $new_path)) {
                    
                    // Thumbnail
                    $thumnail = public_path().Config::get('config.path_upload_image').'/thumb/'.$name_file.'_'.$current_time.'.'.$extension;
                    $this->smart_resize_image($new_path , null, 360, 360, true , $thumnail , false , false , 100);
                    
                    // Medium
                    $medium = public_path().Config::get('config.path_upload_image').'/medium/'.$name_file.'_'.$current_time.'.'.$extension;
                    $this->smart_resize_image($new_path , null, 640, 640, true , $medium , false , false , 100);
                    
                    // Resize original
                    $original = public_path().Config::get('config.path_upload_image').'/original/'.$name_file.'_'.$current_time.'.'.$extension;
                    $this->smart_resize_image($new_path , null, 1200, 1200, true , $original , false , false , 100);
                    
                    $media->path = Config::get('config.path_upload_image');
                    $media->thumb = '/thumb/'.$name_file.'_'.$current_time.'.'.$extension;
                    $media->medium = '/medium/'.$name_file.'_'.$current_time.'.'.$extension;
                    $media->original = '/original/'.$name_file.'_'.$current_time.'.'.$extension;
                    
                    $check_validate = true;
                }
                
            }
            
            if (in_array(strtolower($extension), $allowed_file)) {
                $new_path = public_path().Config::get('config.path_upload_file').'/'.$name_file.'_'.$current_time.'.'.$extension;
                if (move_uploaded_file($_FILES['upl']['tmp_name'], $new_path)) {
                    $media->path = Config::get('config.path_upload_file');
                    $media->original = "/".$name_file.'_'.$current_time.'.'.$extension;
                    $check_validate = true;
                }
            }
            if ($check_validate) {
                $media->save();
                
                $result['status'] = 'success';
                $result['media'] = array(
                    'id' => $media->id,
                    'name_file' => $name_file_origin,
                    'extension' => $extension,
                    'thumb' => $media->path.$media->thumb,
                    'original' => $media->path.$media->original,
                    'caption' => $media->caption ? $media->caption : '',
                    'deleteUrl' => URL::to('/media/delete/'.$media->id),
                    'is_image' => $media->type == Config::get('config.media_type.image') ? 1 : 0,
                );
            }
            
        }
        
        return Response::json($result);
    }
    
    
    /**
     * Easy image resize function
    * @param  $file - file name to resize
    * @param  $string - The image data, as a string
    * @param  $width - new image width
    * @param  $height - new image height
    * @param  $proportional - keep image proportional, default is no
    * @param  $output - name of the new file (include path if needed)
    * @param  $delete_original - if true the original image will be deleted
    * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
    * @param  $quality - enter 1-100 (100 is best quality) default is 100
    * @return boolean|resource
    * @author Thuan Truong
    */
    function smart_resize_image($file,
            $string             = null,
            $width              = 0,
            $height             = 0,
            $proportional       = false,
            $output             = 'file',
            $delete_original    = true,
            $use_linux_commands = false,
            $quality = 100
    ) {
    
        if ( $height <= 0 && $width <= 0 ) return false;
        if ( $file === null && $string === null ) return false;
    
        # Setting defaults and meta
        $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
        $image                        = '';
        $final_width                  = 0;
        $final_height                 = 0;
        list($width_old, $height_old) = $info;
        $cropHeight = $cropWidth = 0;
    
        # Calculating proportionality
        if ($proportional) {
            /*if      ($width  == 0)  $factor = $height/$height_old;
            elseif  ($height == 0)  $factor = $width/$width_old;
            else                    $factor = min( $width / $width_old, $height / $height_old );
    
            $final_width  = round( $width_old * $factor );
            $final_height = round( $height_old * $factor );
            */
            if ($width_old <= $width && $height_old <= $height) {
                $final_width = $width_old;
                $final_height = $height_old;
            }
            if ($width_old <= $width && $height_old > $height) {
                $final_height = $height;
                $final_width = round( ($height / $height_old) * $width_old);
            }
            if ($width_old > $width && $height_old <= $height) {
                $final_width = $width;
                $final_height = round( ($width / $width_old) * $height_old);
            }
            if ($width_old > $width && $height_old > $height) {
                $factor = min( $width / $width_old, $height / $height_old );
                $final_width  = round( $width_old * $factor );
                $final_height = round( $height_old * $factor );
            }
            
        }
        else {
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
            $widthX = $width_old / $width;
            $heightX = $height_old / $height;
             
            $x = min($widthX, $heightX);
            $cropWidth = ($width_old - $width * $x) / 2;
            $cropHeight = ($height_old - $height * $x) / 2;
        }
    
        # Loading image to memory according to type
        switch ( $info[2] ) {
        case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
        default: return false;
        }
    
    
        # This is the resizing/resampling/transparency-preserving magic
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
        $transparency = imagecolortransparent($image);
        $palletsize = imagecolorstotal($image);
    
        if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
        }
        elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
        }
        }
        imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
    
    
        # Taking care of original, if needed
        if ( $delete_original ) {
            if ( $use_linux_commands ) exec('rm '.$file);
            else @unlink($file);
        }
    
        # Preparing a method of providing result
        switch ( strtolower($output) ) {
        case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
        break;
        case 'file':
            $output = $file;
            break;
            case 'return':
            return $image_resized;
            break;
            default:
            break;
        }
    
        # Writing image according to type to the output destination and image quality
        switch ( $info[2] ) {
        case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
        case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
        case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
            imagepng($image_resized, $output, $quality);
            break;
            default: return false;
        }
    
        return true;
    }
    
    /**
     * Update caption image
     * @param $id ID of image
     * @param $caption: text
     * @author Thuan Truong
     * @return JSON
     */
    public function editCaption() {
        $result = array(
            'status' => 0,
            'message' => Lang::get('reminders.error_action')
        );
        $id = Input::get('id', 0);
        $image = $this->media->whereRaw('id = ? and type = ? and is_deleted = ?', array($id, Config::get('config.media_type.image'), 0))->first();
        if (count($image) > 0) {
            $caption = Input::get('caption', '');
            $image->caption = $caption;
            $image->save();
            
            $result['status'] = 1;
            $result['image'] = array(
                                'id' => $image->id,
                                'caption' => $image->caption
                            );
            $result['message'] = Lang::get('nav.page.uploader.update_caption');
        }
        return Response::json($result);
    }
    
}