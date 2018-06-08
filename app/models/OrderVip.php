<?php
class OrderVip extends Eloquent {

    protected $table = 'zz_orders_vip';
    protected $primaryKey = 'order_id';
    
    /**
     * search order by user
     * @author Thuan Truong
     */
    public function searchOrder($input) {
        $query = OrderVip::query();
        $query->orderBy('created_at', 'desc')->get();
        
        $orders = $query->paginate(10);
        return $orders;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = OrderVip::query();
        
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
}
    