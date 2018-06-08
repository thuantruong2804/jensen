<?php

class CategoryController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Category $category) {
        parent::__construct();
        $this->category = $category;
    }

	/**
	 * Display a Categories list
     * @author Thuan Truong
	 * @return Response
	 */
	public function index() {
	    $input = array_map('trim', Input::all());
        $categories = $this->category->searchCategory($input);
        $totalRecords = $this->category->getTotalRecords($input);

        $view = View::make('category.index')->with(array(
            'categories' => $categories,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
	}
	
	/**
	 * View form create category
	 * @author Thuan Truong
	 */
	public function create() {
	    $input = array_map('trim', Input::all()); 
        if (!empty($input)) {
            $validator = $this->category->validate($input);

            if($validator->passes()){
                $this->category->saveCategory($input);
                
                Session::flash('f_notice', Lang::get('category.action.create.done'));                
                return Response::json(array(
                        'status' => 1,
                        'redirect' => route('admin.category.index'),
                        'message' => Lang::get('category.action.create.done')
                ));
                
            }else{
                return Response::json(array(
                    'status' => 0, 
                    'code' => 'invalid_data', 
                    'messages' => $validator->messages()->getMessages()));
            }       
        } else {
            $view = View::make('category.create');
            $this->layout->content = $view;
        }
	}
	
    /**
     * view edit category
     * @author Thuan Truong
     */
    public function edit($id) {
        $category = $this->category->getCategoryById($id);
        $view = View::make('category.edit')->with(array(
            "category" => $category,
        ));
        if (Request::ajax()) {
            return $this->ajaxResponse($view, Lang::get('nav.page.user.index'));
        } else {
            $this->layout->content = $view;
        }
    }
    
    /**
     * update category
     * @author Thuan Truong
     */
    public function update($id) {
        
        $input = array_map('trim', Input::all());   //trim input       
        $validator = $this->category->validate($input);
        if($validator->passes()) {
            $this->category->updateCategory($input, $id);
            Session::flash('f_notice', 'Danh mục đã được cập nhật thành công.');                  
            return Response::json(array(
                    'status' => 1,
                    'redirect' => route('admin.category.index'),
                    'message' => 'Danh mục đã được cập nhật thành công.'
            ));
            
        } else {
            return Response::json(array(
                'status' => 0, 
                'code' => 'invalid_data', 
                'messages' => $validator->messages()->getMessages()));
        }       
    }
    
    /**
     * Update Status category: Publish or unpublish
     * @param integr $id: ID of category
     * @param integer $status: 0 is unpublish, 1 is publish
     * @return json response
     */
    public function updateStatus($id) {
        $category = Category::find($id);
        if ($category) {

            $status = Input::get('status', 0);
            $status = (int) $status;
            $category->status = $status;
            $category->update();          
            
            Session::flash('f_notice', $status ? 'Danh mục đã được hiển thị thành công' : 'Danh mục đã được ẩn thành công');
            if (Request::wantsJson()) {
                return Response::json(array(
                    'status' => 1,
                    'href' => URL::to('/admin/category/list')
                ));
                
            } else {
                return Redirect::action('CategoryController@index')->with('f_notice', Lang::get('gallery.action.public.done'));
            }
        }
    }
    
    /**
     * Delete category 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function destroy($id) {
        $this->category->deleteCategory($id);
        if (Request::wantsJson()) {
            return Response::json(array(
                'status' => 1,
                'message' => Lang::get('category.action.delete.done')
            ));
        } else {
            return Redirect::action('GalleryController@index')->with('f_notice', Lang::get('category.action.delete.done'));
        }
    }
    
}
