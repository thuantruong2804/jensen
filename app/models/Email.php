<?php
/**
 * Handle all action about email
 * Integrate with cron job to send mail
 * @author Thuan Truong
 * ------------------------------------------
 */
class Email extends Eloquent {
    protected $table = 'zz_emails';
    protected $primaryKey = 'email_id';
    
    /**
     * Add email
     * @param string $subject
     * @param string $from
     * @param string $to
     * @param text $body
     * @return 1 if success, otherwise 0
     */
    public function add($subject = '', $to = '', $cc = '', $content = '', $link_attack = '') {        
        $result = 0;
        if (!empty($subject) && !empty($to)) {
            $new_email = new Email;
            $new_email->subject = trim($subject);
            $new_email->email_to = $to;
            $new_email->email_cc = $cc;
            $new_email->content = $content;
            $new_email->link_attack = $link_attack;
            $new_email->save();
            $result = 1;
        }
        return $result;
    }
    
    /**
     * Tracking to send emails process
     */
    public function trackingSendEmail() {
        $this->sendEmail();
    }
    
    /**
     * Send emails
     * Sent limit emails (defined in config file) in the same time
     * Only send emails have been not actived and max_fail less than number (defined in config file)
     */
    public function sendEmail() {
        $emails = Email::whereRaw('status = ? and fail_number < ?', array(0, 3))
                        ->orderBy('created_at', 'desc')
                        ->take(10)->get();
        if (count($emails) > 0) {
            foreach ($emails as $email) {
                Log::info("Sending email to ".$email->email_to);
                if (!empty($email->email_to)) {
                    try {
                        Mail::queue('emails.templates.index', $email->toArray(), 
                            function ($message) use ($email) {
                                $message->subject($email->subject);
                                $message->to(explode(',', $email->email_to));
                                if (!empty($email->email_cc)) {
                                    $message->cc(explode(',', $email->email_cc));
                                }
                                if (!empty($email->link_attack)) {
                                    if (strpos($email->link_attack, 'var/www')) {
                                        $link_attack = $email->link_attack;
                                        $message->attach($link_attack, array('mime' => 'application/xls'));
                                    } else {
                                        $link_attacks = $email->link_attack;
                                        $link_attacks = explode(',', $link_attacks);
                                    
                                        foreach($link_attacks as $link_attack) {
                                            $link_attack = storage_path('../..'.$link_attack);
                                            $message->attach($link_attack, array('mime' => 'application/xls'));
                                        }
                                    }
                                }
                            }
                        );
                        
                        // Update active status
                        $this->updateActiveStatus($email->email_id, true, false);
                    } catch (Exception $e) {
                        Log::info('Error send mail to ' . $email->email_to);
                        
                        Log::info($e->getMessage());
                        
                        // Update active status
                        $this->updateActiveStatus($email->email_id, false, true);
                    }
                }
            }
        }
    }
    
    /**
     * Update Status email
     * @param: $email_id
     */
    public function updateActiveStatus($email_id = 0, $active = true, $send_fail = false) {
        $email = $this->find($email_id);
        if ($active == true) {
            $email->status = 1;
            Log::info('Email sent to: ' . $email->email_to);
        }
        if ($send_fail == true) {
            $email->fail_number += 1;
        }
        $email->save();
    }
    
    /**
     * Check is lock or not. If file is locked then increase content of lock
     * @return boolean true if process is locked
     */
    public function checkLock() {
        $url_file = public_path().'/'.Config::get('config.tracking.lock_file');
        if (file_exists($url_file)) {
            $lock_content = (int)file_get_contents($url_file);
            if ($lock_content >= Config::get('config.tracking.max_fail')) {
                Log::info("Force release lock file");
                $this->releaseLock();
                return false;
            } else {
                Log::info("Process rejected by lock file");
                
                $lock_content ++;
                
                $fp = fopen($url_file, "w");
                fwrite($fp, $lock_content);
                fclose($fp);
            }
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Create lock file
     */
    public function createLock() {
        $url_file = public_path().'/'.Config::get('config.tracking.lock_file');
        $fp = fopen($url_file, "wb");
        if ( $fp == false ) {
            Log::info("Could not creat lock file");
        } else {
            fwrite($fp, 1);
            fclose($fp);
        }
    }
    
    /**
     * Release lock file
     */
    public function releaseLock() {
        $url_file = public_path().'/'.Config::get('config.tracking.lock_file');
        if (file_exists($url_file)) {
            if (unlink($url_file)) {
                Log::info("Lock file has been deleted");
            } else {
                Log::info("Could not delete lock file");
            }
        }
    }
    
}