<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Str;

class EmailHistory extends Model
{
    use HasFactory;
    public function save_email($emailData){
    	$record = new EmailHistory;
        $record->public_id = (string) Str::uuid();
    	if( isset($emailData['from']) ) {
            $user = User::where("email" , $emailData['from'])->first();
            if($user){
            	$record->from = $user->id;
            }
            $record->from_email = $emailData['from'];
        }

        if( isset($emailData['to']) ) {
            $user = User::where("email" , $emailData['to'])->first();
            if($user){
            	$record->to = $user->id;
            }
            $record->to_email = $emailData['to'];
        }

        if( isset($emailData['email_html']) ){
        	$record->email_html = $emailData['email_html'];
        }

        if( isset($emailData['subject']) ){
        	$record->subject = $emailData['subject'];
        }

        $record->save();
    }
}
