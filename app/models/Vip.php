<?php
class Vip extends Eloquent {

    protected $table = 'zz_vips';
    protected $primaryKey = 'vip_id';
    
    
    /**
      * Validate for update
      * @author Thuan Truong
      * @param input
      */
     public function validateUpdate($input) {
        $rules = array(
            'name' => 'required|max:250',
            'num_date' => 'required|integer',
            'price' => 'required|integer|min:0',
            'sale_price' => 'required|integer|min:0',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
     }
     
     
     /**
      * Update
      * @author Thuan Truong
      */
     public function updateVip ($input, $id) {
         $vip = Vip::find($id);
         
         $vip->name = $input['name'];
         $vip->num_date = $input['num_date'];
         $vip->price = $input['price'];
         $vip->sale_price = $input['sale_price'];
         $vip->update();
     }
     
}