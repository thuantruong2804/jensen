<?php

class ProductController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Product $product) {
        parent::__construct();
        $this->product = $product;
    }

    /**
     * Display a product list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $products = $this->product->searchProduct($input);
        $totalRecords = $this->product->getTotalRecords($input);

        $view = View::make('product.index')->with(array(
            'input' => $input,
            'products' => $products,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }
    
    /**
     * create product
     * @author Thuan Truong
     */
    public function create() {
        $input = Input::all();
        if (!empty($input)) {
            $input['price'] = str_replace(",", "", $input['price']);
            $input['sale_price'] = str_replace(",", "", $input['sale_price']);
            $validator = $this->product->validate($input);
            if($validator->passes()){
                $this->product->createProduct($input);   
                Session::flash('f_notice', 'Sản phẩm đã được tạo thành công.');  
                return Response::json(array( 'status' => 1, 'redirect' => route('admin.product'), 'message' => 'Sản phẩm đã được tạo thành công.' ));
            } else {
                return Response::json(array( 'status' => 0,  'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $view = View::make('product.create');
            $this->layout->content = $view;
        }
        
    }


    /**
     * edit product
     * @author Thuan Truong
     */
    public function edit($id) {
        $product = Product::find($id);
        if (empty($product)) {
            return Redirect::action('ProductController@index');
        }
        $input = Input::all();   //trim input
        if (!empty($input)) {
            $input['price'] = str_replace(",", "", $input['price']);
            $input['sale_price'] = str_replace(",", "", $input['sale_price']);
            
            $validator = $this->product->validateUpdate($input);
            if($validator->passes()){
                $this->product->updateProduct($input, $id);   
                Session::flash('f_notice', 'Sản phẩm đã được cập nhật thành công.');  
                return Response::json(array( 'status' => 1, 'redirect' => route('admin.product'), 'message' => 'Sản phẩm đã được cập nhật thành công.' ));
            }else{
                return Response::json(array( 'status' => 0,  'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $view = View::make('product.edit')->with(array(
                "product" => $product,
            ));
            $this->layout->content = $view;
        }
    }

    
    /**
     * Delete Product 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function delete($id) {
        $product = Product::find($id);
        if (empty($product)) {
            return Redirect::action('ProductController@index');
        }
        Product::destroy($id);
        
        Session::flash('f_notice', 'Sản phẩm đã được xóa thành công');
        return Response::json(array(
            'status' => 1,
            'href' => URL::to('/admin/product'),
        ));
    }
    
    /**
     * detail product
     * @author Thuan Truong
     */
    public function detail($id) {
        $product = Product::find($id);
        if (empty($product)) {
            return Redirect::action('HomeController@index');
        }
        
        $categoryProducts = Product::whereRaw('is_deleted = ? and status = ? and category_id = ?', array(0, 1, $product->category_id))->orderBy('updated_at', 'desc')->skip(0)->take(7)->get();
        
        $this->layout = View::make('layouts.application');
        $view = View::make('product.detail')->with(array(
            'product' => $product,
            'categoryProducts' => $categoryProducts
        ));
        $this->layout->content = $view;
    }

    
    /**
     * category
     * @author Thuan Truong
     */
    public function category($id) {
        $category = Category::find($id);
        if (empty($category)) {
            return Redirect::action('HomeController@index');
        }
        
        $categoryProducts = Product::whereRaw('is_deleted = ? and status = ? and category_id = ?', array(0, 1, $id))->orderBy('updated_at', 'desc')->paginate(9);
        $mostProducts = Product::whereRaw('is_deleted = ? and status = ?', array(0, 1))->orderBy('num_buy', 'desc')->skip(0)->take(7)->get();
        
        $this->layout = View::make('layouts.application');
        $view = View::make('product.category')->with(array(
            'category' => $category,
            'categoryProducts' => $categoryProducts,
            'mostProducts' => $mostProducts,
        ));
        $this->layout->content = $view;
    }


    /**
     * category
     * @author Thuan Truong
     */
    public function search() {
        $input = array_map('trim', Input::all());
                
        $categoryProducts = Product::whereRaw("is_deleted = ? and status = ? and slug LIKE ?", array(0, 1, '%'.$input['slug'].'%'))->orderBy('updated_at', 'desc')->paginate(9);
        $mostProducts = Product::whereRaw('is_deleted = ? and status = ?', array(0, 1))->orderBy('num_buy', 'desc')->skip(0)->take(7)->get();
        
        $this->layout = View::make('layouts.application');
        $view = View::make('product.category')->with(array(
            'category' => 1,
            'categoryProducts' => $categoryProducts,
            'mostProducts' => $mostProducts,
        ));
        $this->layout->content = $view;
    }


    /**
     * payment product
     * @author Thuan Truong
     */
    public function payment($id) {
        $product = Product::find($id);
        if (empty($product)) {
            return Redirect::action('HomeController@index');
        }
        
        $currentAccount = BaseController::getAccountInfo();
        
        DB::table('accounts')->where('UserName', $currentAccount->UserName)->update(array('Coin' => $currentAccount->Coin - (int)$product->sale_price));
        
        $order = new Order;
        $order->account_id = $currentAccount->id;
        $order->product_id = $product->pro_id;
        $order->sale_price = $product->sale_price;
        $order->save();
        
        
        $product->num_buy = (int)$product->num_buy + 1;
        $product->update();
        
        if ($product->category_id == 1) {
            // insert to vehicle
            DB::table('vehicles')->insert(
                array(
                    'sqlID' => $currentAccount->id, 
                    'pvModelId' => $product->code, 
                    'pvPosX' => $currentAccount->SPos_x, 
                    'pvPosY' => $currentAccount->SPos_y, 
                    'pvPosZ' => $currentAccount->SPos_z,
                    'pvCoin' => (int)$product->sale_price,
                    'sqlIDFixed' => $currentAccount->id,
                    'payDate' => date('Y-m-d H:i:s')
                )
            );
            
            Session::flash('f_notice', 'Mua sản phẩm thành công, hãy vào game kiểm tra kho đồ.');  
            return Response::json(array( 'status' => 1, 'redirect' => URL::to('/san-pham/danh-muc/1/phuong-tien.html'), 'message' => '' ));
        } else {
            // insert to toy
            DB::table('toys')->insert(
                array('player' => $currentAccount->id, 'modelid' => $product->code, 'posx' => $currentAccount->SPos_x, 'posy' => $currentAccount->SPos_y, 'posz' => $currentAccount->SPos_z)
            );
            
            Session::flash('f_notice', 'Mua sản phẩm thành công, hãy vào game kiểm tra kho đồ.');  
            return Response::json(array( 'status' => 1, 'redirect' => URL::to('/san-pham/danh-muc/2/do-choi.html'), 'message' => '' ));
        }
    }
}