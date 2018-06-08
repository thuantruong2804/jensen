<?php
class Discount extends Eloquent {
    
	protected $table = 'zz_discounts';
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
        $query = Discount::query();
        $appends = array();
        
        if (!empty($input['title'])) {
            $query->where('Discount_Name', 'LIKE', '%'.$input['title'].'%');
            $appends['title'] = $input['title'];
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $discounts = $query->paginate(10)->appends($appends);
        return $discounts;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Discount::query();
        
        if (!empty($input['title'])) {
            $query->where('Discount_Name', 'LIKE', '%'.$input['title'].'%');
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
            'name' => 'required|max:250',
            'percent' => 'required|numeric|min:1|max:100',
            'message' => 'required|max:6000'
        );
        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    /**
     * Create new or promotion
     * @author Thuan Truong
     * @param input
     */
    public function createDiscount($input) {
        $account = BaseController::getAccountInfo();
             
        $discount = new Discount;
        $discount->Discount_Name = $input['name'];
        $discount->Discount_Percent = $input['percent'];
        $discount->Discount_Card_Apply = implode(',', $input['card']);
        $discount->Discount_Message = $input['message'];
        $discount->Discount_Start_Date = date('Y-m-d', strtotime($input['start_date']));
        $discount->Discount_Exprire_Date = date('Y-m-d', strtotime($input['end_date']));
        $discount->Discount_Creator = $account->UserName;
        $discount->save();
        
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