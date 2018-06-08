<?php

class Comment extends Eloquent {
    
    protected $table = 'zz_comments';
    protected $primaryKey = 'comment_id';
    
    public function __construct() {
        parent::__construct();
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