<?php
use Illuminate\Auth\UserInterface;
class Lab extends Eloquent {
    
    protected $table = 'labs';
    protected $primaryKey = 'id';
    
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    }
    /**
     * validate register
     * @author Thuan Truong
     */
    public function validate($input){
         $rules = array(
            'name' => 'required|min:5|max:300',
            'address' => 'required|max:300',
            'phone'=>'required|min:9|max:50',
            'lat'=>'required|min:4|max:30',
             'long'=>'required|min:4|max:30',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }

    
    /**
     * search lab by name
     * @author Thuan Truong
     */
    public function searchLab($input) {
        $query = Lab::query();
        $appends = array();
        
        if (!empty($input)) {   
            if (!empty($input['name'])) {
                $query->where('name', 'LIKE', '%'.$input['name'].'%');
                $appends['name'] = $input['name'];
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            } 
        }
        
        $query->orderBy('created_at', 'desc');
        
        $labs = $query->paginate(10)->appends($appends);
        return $labs;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Lab::query();
        
        if (!empty($input)) {   
            if (!empty($input['name'])) {
                $query->where('name', 'LIKE', '%'.$input['name'].'%');
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
     * create account
     * @author Thuan Truong
     */
    public function saveLab($input) {
        $lab = new Lab;

        $lab->name = $input['name'];
        $lab->address = $input['address'];
        $lab->phone = $input['phone'];
        $lab->lat = $input['lat'];
        $lab->long = $input['long'];
        $lab->status = 1;
        $lab->save();

        return $lab;
    }
    
    /**
     * create lab
     * @author Thuan Truong
     */
    public function updateLab($input, $labId) {
        $lab = Lab::find($labId);

        $lab->name = $input['name'];
        $lab->address = $input['address'];
        $lab->phone = $input['phone'];
        $lab->lat = $input['lat'];
        $lab->long = $input['long'];

        $lab->update();
    }
    
}