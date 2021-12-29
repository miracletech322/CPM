<?php

namespace App\Jobs;

use App\Models\EmailHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email_data)
    {
        $this->email_data = $email_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email_data = $this->email_data;
        $today = date("Y-m-d H:i:s");
        $email_data['email_html'] = view('emails.' . $email_data['template'], compact('email_data'));

        Mail::send('emails.' . $email_data['template'], ['email_data' => $email_data], function ($message) use ($email_data) {

            $message->subject($email_data['subject']);
            $message->to($email_data['to'], (isset($email_data['to_name'])) ? $email_data['to_name'] : '');

            if (!isset($email_data['from']) || empty($email_data['from_name']))
                $message->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            else
                $message->from($email_data['from'], $email_data['from_name']);
        });

        if (count(Mail::failures()) > 0) {
            return false;
        } else {
            $history = new EmailHistory();
            if (is_array($email_data['to'])) {
                $emails = $email_data['to'];
                foreach ($emails as $key => $email) {
                    $email_data['to'] = $email;
                    $history->save_email($email_data);
                }
            } else
                $history->save_email($email_data);
            return true;
        }

    }
}
