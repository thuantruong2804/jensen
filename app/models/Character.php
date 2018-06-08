<?php
class Character extends Eloquent {

    protected $table = 'characters';
    protected $primaryKey = 'ID';


    /**
     * search account by username
     * @author Thuan Truong
     */
    public function searchCharacter($input) {
        $query = Character::query();
        $appends = array();

        if (!empty($input)) {
            if (!empty($input['username'])) {
                $query->where('CharacterName', 'LIKE', '%'.$input['username'].'%');
                $appends['username'] = $input['username'];
            }
            if (isset($input['disabled']) && $input['disabled'] != -1) {
                $query->where('Active', $input['disabled']);
                $appends['disabled'] = $input['disabled'];
            }
        }

        $query->orderBy('created_at', 'desc');

        $accounts = $query->paginate(10)->appends($appends);
        return $accounts;
    }

    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Character::query();

        if (!empty($input)) {
            if (!empty($input['username'])) {
                $query->where('CharacterName', 'LIKE', '%'.$input['username'].'%');
            }
            if (isset($input['disabled']) && $input['disabled'] != -1) {
                $query->where('Active', $input['disabled']);
                $appends['disabled'] = $input['disabled'];
            }
        }

        $totalRecords = $query->count();

        return $totalRecords;
    }

    /**
     * validate character
     * @author Thuan Truong
     */
    public function validateCharacter($input){
		$rules = array(
            'charactername' => 'required|min:5|max:50|account|unique:characters',
            'birthday' => 'required|max:50',
            'city'=>'required',
            'skin'=>'required|numeric|min:0|max:311',
            'character_introdue'=>'required|min:6|max:2000',
            'term_description'=>'required|min:6|max:2000',
            'roleplay_description'=>'required|min:6|max:2000',

        );
		
		if (Config::get('config.auto_active_charactor')) {
			$rules = array(
				'charactername' => 'required|min:5|max:50|account|unique:characters',
				'birthday' => 'required|max:50',
				'city'=>'required',
				'skin'=>'required|numeric|min:0|max:311',
			);
		} 
        

        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * validate character
     * @author Thuan Truong
     */
    public function validateCharacterEdit($input){
        $rules = array(
            'character_introdue'=>'required|min:6|max:2000',
        );

        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * create character
     * @author Thuan Truong
     */
    public function saveCharacter($input) {
		if (Config::get('config.auto_active_charactor')) {
			$currentAccount = BaseController::getAccountInfo();

			$character = new Character();

			$character->AccountID = $currentAccount->ID;
			$character->Active = 1;
            $character->active_by = 'system';
			$character->Create_Stamp = time();
			$character->CharacterName = $input['charactername'];
			$character->Gender = $input['gender'];
			$character->BirthDate = $input['birthday'];
			$character->Skin = $input['skin'];
			$character->City = $input['city'];
			$character->character_introdue_utf8 = $input['character_introdue'];
			$character->character_introdue = $this->sanitizeStringForUrl($input['character_introdue']);
			$character->term_description_utf8 = $input['term_description'];
			$character->term_description = $this->sanitizeStringForUrl($input['term_description']);
			$character->roleplay_description_utf8 = $input['roleplay_description'];
			$character->roleplay_description = $this->sanitizeStringForUrl($input['roleplay_description']);

			$character->save();
		} else {
			$currentAccount = BaseController::getAccountInfo();

			$character = new Character();

			$character->AccountID = $currentAccount->ID;
			$character->Active = 0;
			$character->Create_Stamp = time();
			$character->CharacterName = $input['charactername'];
			$character->Gender = $input['gender'];
			$character->BirthDate = $input['birthday'];
			$character->Skin = $input['skin'];
			$character->City = $input['city'];
			$character->character_introdue_utf8 = $input['character_introdue'];
			$character->character_introdue = $this->sanitizeStringForUrl($input['character_introdue']);
			$character->term_description_utf8 = $input['term_description'];
			$character->term_description = $this->sanitizeStringForUrl($input['term_description']);
			$character->roleplay_description_utf8 = $input['roleplay_description'];
			$character->roleplay_description = $this->sanitizeStringForUrl($input['roleplay_description']);

			$character->save();
		}   
    }


    /**
     * create character
     * @author Thuan Truong
     */
    public function editCharacter($id, $input) {
        $currentAccount = BaseController::getAccountInfo();

        $character = Character::find($id);

        $character->character_introdue_utf8 = $input['character_introdue'];
        $character->character_introdue = $this->sanitizeStringForUrl($input['character_introdue']);

        $character->update();
    }

    /**
     * sanitize String for Url
     */
    public function sanitizeStringForUrl($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        return $str;
    }


}