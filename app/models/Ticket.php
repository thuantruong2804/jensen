<?php

class Ticket extends Eloquent {
    
    protected $table = 'zz_tickets';
    protected $primaryKey = 'ticket_id';
    
    public function __construct() {
        parent::__construct();
    }


    /**
     * search ticket
     * @author Thuan Truong
     */
    public function searchTicket($input) {
        $query = Ticket::query();
        $appends = array();
        
        if (!empty($input)) {   
            if (!empty($input['topic'])) {
                $query->where('topic', 'LIKE', '%'.$input['topic'].'%');
                $appends['topic'] = $input['topic'];
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            } 
        }
        
        $query->orderBy('created_at', 'desc')->get();
        
        $tickets = $query->paginate(10)->appends($appends);
        return $tickets;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Ticket::query();
        
        if (!empty($input)) {   
            if (!empty($input['topic'])) {
                $query->where('topic', 'LIKE', '%'.$input['topic'].'%');
                $appends['topic'] = $input['topic'];
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
     * Get All Ticket Of Account
     * @author Thuan Truong
     */
    public function getTicketOfAccount($accountId) {
        $tickets = Ticket::whereRaw('account_id = ?', array($accountId))->orderBy('updated_at', 'desc')->get();
        return $tickets;
    }
    
    
    /**
     * validate
     * @author Thuan Truong
     */
    public function validate($input){
         $rules = array(
            'topic'=>'required',
            'forum_profile_link' => 'required|min:9|max:255',
            'issue_summary' => 'required|min:5|max:255',
            'issue_detail' => 'required|max:2000',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }  
    
    
    /**
     * Save Ticket
     * @author Thuan Truong
     */
    public function saveTicket($input) {
        $currentAccount = BaseController::getAccountInfo();
        
        $ticket = new Ticket;
        $ticket->account_id = $currentAccount->id;
        $ticket->ticket_type = 1;
        $ticket->topic = $input['topic'];
        $ticket->issue_summary = $input['issue_summary'];
        $ticket->issue_detail = $input['issue_detail'];
        $ticket->forum_profile_link = $input['forum_profile_link'];
        $ticket->status = 0;
        $ticket->save();
    }
}