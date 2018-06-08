<?php
class Product extends Eloquent {

    protected $table = 'zz_products';
    protected $primaryKey = 'pro_id';
    
    /**
     * Get Media
     */
    public function media() {
        return $this->belongsTo('Media');
    }
    
    /**
     * search product by name
     * @author Thuan Truong
     */
    public function searchProduct($input) {
        $query = Product::query();
        $appends = array();
        
        if (!empty($input['name'])) {
            $query->where('name', 'LIKE', '%'.$input['name'].'%');
            $appends['name'] = $input['name'];
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $products = $query->paginate(10)->appends($appends);
        return $products;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Product::query();
        
        if (!empty($input['name'])) {
            $query->where('name', 'LIKE', '%'.$input['name'].'%');
        }
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
    /**
      * Validate for create 
      * @author Thuan Truong
      * @param input
      */
     public function validate($input) {
        $rules = array(
            'name' => 'required|max:250',
            'price' => 'required|integer|min:0',
            'sale_price' => 'required|integer|min:0',
            'video' => 'required|max:250',
            'code' => 'required|unique:zz_products|max:30',
			'files' => 'required'
        );
                                            
        $validator = Validator::make($input, $rules);
        return $validator;
     }

	/**
      * Validate for update
      * @author Thuan Truong
      * @param input
      */
     public function validateUpdate($input) {
        $rules = array(
            'name' => 'required|max:250',
            'price' => 'required|integer|min:0',
            'sale_price' => 'required|integer|min:0',
            'video' => 'required|max:250',
            'code' => 'required|max:30',
			'files' => 'required'
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
     }
     
     /**
      * Save product when create
      * @author Thuan Truong
      */
     public function createProduct ($input) {
         $images = null;
         if (!empty($input['files'])) {
             $images = implode(',', $input['files']);
         }
         
         $product = new Product;
         
         $product->name = $input['name'];
         $product->slug = BaseController::sanitizeStringForUrl($input['name']);
         $product->code = $input['code'];
         $product->category_id = $input['cate_id'];
         $product->media_id = $images;
         $product->sale_price = $input['sale_price'];
         $product->price = $input['price'];
         $product->video = $input['video'];
         $product->description = $input['description'];
         $product->status = 1;
         $product->save();
     }
     
     /**
      * Update product when create
      * @author Thuan Truong
      */
     public function updateProduct ($input, $id) {
          $images = null;
         if (!empty($input['files'])) {
             $images = implode(',', $input['files']);
         }
         
         $product = Product::find($id);
         
         $product->name = $input['name'];
         $product->slug = BaseController::sanitizeStringForUrl($input['name']);
         $product->code = $input['code'];
         $product->category_id = $input['cate_id'];
         $product->media_id = $images;
         $product->sale_price = $input['sale_price'];
         $product->price = $input['price'];
         $product->video = $input['video'];
         $product->description = $input['description'];
         $product->update();
     }
     
     /**
      * destroy product
      * @author Thuan Truong
      */
     public function deleteProduct($id) {
         $product = Product::find($id);
         if (empty($product)) {
             return Redirect::action('ProductController@index')->with('f_notice', 'Sản phẩm này không tồn tại hoặc đã bị xóa');
         }
         $product->is_deleted = 1;
         $product->update();
     }
}