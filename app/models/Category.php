<?php
class Category extends Eloquent {

	protected $table = 'zz_categories';
    protected $primaryKey = 'cate_id';
    
    /**
     * get category by id
     * @author Thuan Truong
     */
    public function getCategoryById ($id) {
        return $this->whereRaw('cate_id = ? and is_deleted = ?', array($id, 0))->first();
    }
    
    /**
     * search category by name
     * @author Thuan Truong
     */
    public function searchCategory($input) {
        $query = Category::query();
        $appends = array();
        
        if (!empty($input['name'])) {
            $query->where('name', 'LIKE', '%'.$input['name'].'%');
            $appends['name'] = $input['name'];
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $categories = $query->paginate(10)->appends($appends);
        return $categories;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Category::query();
        
        if (!empty($input['name'])) {
            $query->where('name', 'LIKE', '%'.$input['name'].'%');
        }
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
    /**
     * get all publish category view by home
     * @author Thuan Truong
     */
    public function getAllPublishCategories() {
        $categories = Category::whereRaw('status = ? and is_deleted = ?', array(1,0))->get();
        return $categories;
    }
	
	/**
      * Validate for create and update
      * @author Thuan Truong
      * @param input
      */
     public function validate($input) {
        $rules = array(
            'parent' => 'required',
            'name' => 'required|max:150',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
     }
	 
	 /**
	  * Save category
	  * @author Thuan Truong
	  */
	 public function saveCategory($input) {
	     $category = new Category;
         $category->parent_id = $input['parent'];
         $category->name = $input['name'];
         $category->description = $input['description'];
         $category->status = 0;
         $category->save();
	 }
     
     /**
      * Update category
      * @author Thuan Truong
      */
     public function updateCategory($input, $id) {
         $category = Category::find($id);
         $category->parent_id = $input['parent'];
         $category->name = $input['name'];
         $category->description = $input['description'];
         $category->update();
     }
     
     /**
      * Destroy Category
      * @author Thuan Truong
      */
     public function deleteCategory($id) {
         $category = Category::find($id);
         if (empty($category)) {
             return Redirect::action('CategoryController@index')->with('f_notice', 'Danh mục này không tồn tại hoặc đã bị xóa');
         }
         $category->is_deleted = 1;
         $category->update();
     }
}