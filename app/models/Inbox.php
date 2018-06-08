<?php
class Inbox extends Eloquent {
    
	protected $table = 'zz_inboxs';
    protected $primaryKey = 'inbox_id';
    
	/**
	 * Get Media
	 * @author Duc Nguyen
	 */
	public function media() {
		return $this->belongsTo('Media');
	}
	
    /**
     * search inbox by title
     * @author Thuan Truong
     */
    public function search($input) {
        $query = Inbox::query();
        $appends = array();
        
        if (!empty($input['receive_account_id'])) {
            $query->where('receive_account_id', '=', $input['receive_account_id']);
            $appends['receive_account_id'] = $input['receive_account_id'];
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $inboxs = $query->paginate(10)->appends($appends);
        return $inboxs;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Inbox::query();
        
        if (!empty($input['receive_account_id'])) {
            $query->where('receive_account_id', '=', $input['receive_account_id']);
        }
        
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
    
    /**
     * Validate input create, update new & promotion
     * @author Thuan Truong
     * @param input
     * @return array
     */
    public function validate($input) {
        $rules = array(
            'title' => 'required|max:512',
            'content' => 'required|max:3000',
        );
        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    /**
     * Create inbox
     * @author Thuan Truong
     * @param input
     */
    public function createInbox($input) {
        $account = BaseController::getAccountInfo();

        $inbox = new Inbox;
        $inbox->title = $input['title'];
        $inbox->content = $input['content'];
        $inbox->sender = $account->UserName;
        $inbox->receive_account_id = $input['receive_account_id'];
        $inbox->is_read = $inbox->receive_account_id != -1 ? 0 : 1;
        $inbox->save();
    }


}