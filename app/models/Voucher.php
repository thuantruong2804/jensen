<?php
class Voucher extends Eloquent {
    
	protected $table = 'zz_vouchers';
    protected $primaryKey = 'ID';
    
	/**
	 * Get Media
	 * @author Duc Nguyen
	 */
	public function media() {
		return $this->belongsTo('Media');
	}
	
    /**
     * search new by title
     * @author Thuan Truong
     */
    public function search($input) {
        $query = Voucher::query();
        $appends = array();
        
        if (!empty($input['code'])) {
            $query->where('Voucher_Code', 'LIKE', '%'.$input['code'].'%');
            $appends['code'] = $input['code'];
        }
        
        $query->orderBy('created_at', 'desc')->get();

        $vouchers = $query->paginate(10)->appends($appends);
        return $vouchers;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Voucher::query();
        
        if (!empty($input['code'])) {
            $query->where('Voucher_Code', 'LIKE', '%'.$input['code'].'%');
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
            'number' => 'required|numeric|min:1|max:100',
            'percent' => 'required|numeric|min:1|max:100',
        );
        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    /**
     * Create new or promotion
     * @author Thuan Truong
     * @param input
     */
    public function createVoucher($input) {
        $account = BaseController::getAccountInfo();

        $numberVoucher = (int)$input['number'];
        for ($i = 1; $i <= $numberVoucher; $i++) {
            $voucher = new Voucher;
            $voucher->Voucher_Code = 'GVC'.strtoupper(uniqid());
            $voucher->Voucher_Discount = $input['percent'];
            $voucher->Voucher_Type = $input['type'];
            $voucher->Voucher_Expire_Date = date('Y-m-d', strtotime($input['end_date']));
            $voucher->save();
        }
    }

    /**
     * Update News
     * @author Thuan Truong
     * @param input form
     * @return none
     */
    public function updateNew($input, $id) {
        $account = BaseController::getAccountInfo();  
        if (!empty($input['file']))
            $media =  $input['file'];
        else {
            $media = '';
        }
        
        $new = News::find($id); 
        $new->user_id = $account->ID;
        $new->slug = BaseController::sanitizeStringForUrl($input['title']);
        $new->title = $input['title'];
        $new->summary = $input['title'];
        $new->content = $input['content'];  
        $new->media_id = $media;
        $new->status = 1;
        $new->update();
        
    }
    
}