<?php
class Card extends Eloquent {

    protected $table = 'cards';
    protected $primaryKey = 'id';

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    }

    /**
     * search card by name
     * @author Thuan Truong
     */
    public function searchCard($input) {
        $query = Card::query();
        $appends = array();

        if (!empty($input)) {
            if (!empty($input['card_no'])) {
                $query->where('card_no', 'LIKE', '%'.$input['card_no'].'%');
                $appends['card_no'] = $input['card_no'];
            }
            if (!empty($input['card_name'])) {
                $query->where('card_name', 'LIKE', '%'.$input['card_name'].'%');
                $appends['card_name'] = $input['card_name'];
            }
            if (!empty($input['doctor'])) {
                $query->where('doctor', 'LIKE', '%'.$input['doctor'].'%');
                $appends['doctor'] = $input['doctor'];
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            }
        }

        $query->orderBy('created_at', 'desc');
        if (isset($input['export']) && $input['export'] == 'true') {
            $cards = $query->get();
        } else {
            $cards = $query->paginate(10)->appends($appends);
        }
        return $cards;
    }

    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Card::query();

        if (!empty($input)) {
            if (!empty($input['card_name'])) {
                $query->where('card_name', 'LIKE', '%'.$input['card_name'].'%');
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            }
        }

        $totalRecords = $query->count();

        return $totalRecords;
    }

     /**
     * validate update
     * @author Thuan Truong
     */
    public function validate($input){
         $rules = array(
            'card_name' => 'required|min:5|max:300',
            'release' => 'required',
            'expire' => 'required',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * update card
     * @author Thuan Truong
     */
    public function updateCard($input, $cardId) {
        $card = Card::find($cardId);

        $card->card_name = mb_strtoupper($input['card_name']);
        $card->doctor = mb_strtoupper($input['doctor']);
        $card->lab = mb_strtoupper($input['lab']);
        $card->position = mb_strtoupper($input['position']);
        $card->sl = $input['sl'];
        $card->release = DateTime::createFromFormat('d/m/Y', $input['release'])->format('Y-m-d 00:00:00');;
        $card->expire = DateTime::createFromFormat('d/m/Y', $input['expire'])->format('Y-m-d 00:00:00');;
        $card->update();

    }

}