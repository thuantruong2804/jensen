<?php
class Transaction extends Eloquent {

    protected $table = 'zz_transactions';
    protected $primaryKey = 'id';
    
    /**
     * search transaction by user
     * @author Thuan Truong
     */
    public function searchTransaction($input) {
        $query = Transaction::query();
        if (!empty($input)) {   
            if (!empty($input['account_id'])) {
                $query->where('account_id', $input['account_id']);
                $appends['account_id'] = $input['account_id'];
            }
        }
        $query->where('status', '=', 1);
        $query->orderBy('created_at', 'desc');
        
        $transactions = $query->paginate(10);
        return $transactions;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Transaction::query();
        if (!empty($input)) {   
            if (!empty($input['account_id'])) {
                $query->where('account_id', $input['account_id']);
                $appends['account_id'] = $input['account_id'];
            }
        }
        $query->where('status', '=', 1);
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
    
    /**
     * validate
     * @author Thuan Truong
     */
    public function validate($input){
         $rules = array(
            'telcoCode'=>'required',
            'cardSerial' => 'required|min:9|max:15',
            'cardPin' => 'required|min:9|max:15',
             'voucher' => 'min:10|max:30'
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }   
    
    /**
     * save transaction
     * @author Thuan Truong
     */
    public function saveTrans($input, $response, $discount, $voucher, $status = 1) {
        $discount_card_amount = 0; $discount_saleoff_amount = 0; $discount_voucher_amount = 0;
        if (empty($discount) && empty($voucher) && ($input['telcoCode'] == 'MGC' || $input['telcoCode'] == 'FPT')) {
            if ($input['telcoCode'] == 'MGC') {
                $discount_card_amount = (int)($response['payment_amount']*0.08);
            } elseif ($input['telcoCode'] == 'FPT') {
                //$discount_card_amount = (int)($response['payment_amount']*0.08);
            }
        }

        if (!empty($voucher) && $voucher->Voucher_Type == 1) {
            $discount_voucher_amount = (int)($response['payment_amount']/100*$voucher->Voucher_Discount);
        }
        if (!empty($voucher) && $voucher->Voucher_Type == 2 && empty($discount)) {
            $discount_voucher_amount = (int)($response['payment_amount']/100*$voucher->Voucher_Discount);
        }

        $arrCard = explode(',', $discount->Discount_Card_Apply);
        if (!empty($discount) && in_array($input['telcoCode'], $arrCard) ) {
            $discount_saleoff_amount = (int)($response['payment_amount']/100*$discount->Discount_Percent);
        }

        $currentAccount = BaseController::getAccountInfo();
        
        $transaction = new Transaction;
        $transaction->account_id = $currentAccount->ID;
        $transaction->telco_code = $input['telcoCode'];
        $transaction->card_serial = $input['cardSerial'];
        $transaction->card_pin = $input['cardPin'];
        $transaction->trans_id = $response['transid'];
        $transaction->card_amount = $response['payment_amount'];
        $transaction->real_amount = $response['payment_amount'];
        $transaction->discount_card_amount = $discount_card_amount;
        $transaction->discount_saleoff_amount = $discount_saleoff_amount;
        $transaction->discount_voucher_amount = $discount_voucher_amount;
        $transaction->voucher_code = !empty($voucher) ? $voucher->Voucher_Code : '';
        $transaction->total_amount = $response['payment_amount'] + $discount_card_amount + $discount_saleoff_amount + $discount_voucher_amount;
        $transaction->status = $status;
        $transaction->save();

        return $transaction;
    }
}