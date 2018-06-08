<?php
class News extends Eloquent {
    
	protected $table = 'zz_news';
    protected $primaryKey = 'new_id';
    
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
    public function searchNew($input) {
        $query = News::query();
        $appends = array();
        
        if (!empty($input['title'])) {
            $query->where('title', 'LIKE', '%'.$input['title'].'%');
            $appends['title'] = $input['title'];
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $news = $query->paginate(10)->appends($appends);
        return $news;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = News::query();
        
        if (!empty($input['title'])) {
            $query->where('title', 'LIKE', '%'.$input['title'].'%');
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
            'title' => 'required|max:250',
            'content' => 'required|max:30000',
            'file' => 'required'
        );
        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    /**
     * Create new or promotion
     * @author Thuan Truong
     * @param input
     */
    public function createNew($input) {
        $account = BaseController::getAccountInfo();  
        if (!empty($input['file']))
            $media =  $input['file'];
        else {
            $media = '';
        }
             
        $new = new News; // create new with lang = en
        $new->user_id = $account->ID;
        $new->slug = BaseController::sanitizeStringForUrl($input['title']);
        $new->title = $input['title'];
        $new->summary = $input['title'];
        $new->content = $input['content'];  
        $new->media_id = $media;
        $new->status = 1;
        $new->save();
        
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