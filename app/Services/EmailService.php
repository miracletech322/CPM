<?php

namespace App\Services;

use App\Models\Company;
use Mail;
use App\Models\EmailHistory;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Jobs\SendMailJob;

class EmailService extends Mailable
{

    use Queueable, SerializesModels;

    public static function sendTestEmail($to)
    {
        Mail::send('emails.testmail', [] , function ($message) use ($to) {
            $message->subject( "Test Email" );
            $message->to( $to );
            $message->from( "noreply@proborrower.com" );

        });

        if ( count( Mail::failures() ) > 0 ) {
            return false;
        } else {
            return true;
        }
    }    

    public function send_email($email_data){
        dispatch(new SendMailJob($email_data));
    }
    
}
