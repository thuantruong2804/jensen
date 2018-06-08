<?php
class Order extends Eloquent {

    protected $table = 'zz_orders';
    protected $primaryKey = 'order_id';
    
    /**
     * search order by user
     * @author Thuan Truong
     */
    public function searchOrder($input) {
        $query = Order::query();
        if (!empty($input)) {   
            if (!empty($input['account_id'])) {
                $query->where('account_id', $input['account_id']);
                $appends['account_id'] = $input['account_id'];
            }
        }
        $query->orderBy('created_at', 'desc');
        
        $orders = $query->paginate(10);
        return $orders;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Order::query();
        if (!empty($input)) {   
            if (!empty($input['account_id'])) {
                $query->where('account_id', $input['account_id']);
                $appends['account_id'] = $input['account_id'];
            }
        }
        
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
}
    