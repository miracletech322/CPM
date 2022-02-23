<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncMailchimp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:mailchimp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync users to mailchimp';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public $token;
    public $list_id;
    public $mailchimp_tag;

    public function handle()
    {

        info("Syncing mailchimp");
        $this->token = env("MAILTRAP_TOKEN");
        $this->list_id = env("MAILTRAP_LISTID");
        $this->mailchimp_tag = env("MAILTRAP_TAG");
        $this->update_mailchimp();

        return 0;
    }

    function update_mailchimp(){
        $users = User::select("users.*")
                        ->where("users.role_id", 3)
                        ->where("is_mailchimp_synced", 0)
                        ->get();

        foreach ($users as $key => $user) {

            $data = [
                "email_address" => $user->email,
                "status"=> "subscribed",
                "tags"=> [$this->mailchimp_tag],
                "merge_fields" => [
                    "FNAME" => $user->first_name,
                    "LNAME" => $user->last_name,
                ]
            ];

            if(blank($user->mailchimp_id))
                $this->add_new_user($data, $user);
            else
                $this->update_user($data, $user);
        }

    }

    function add_new_user($data, $user){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://us19.api.mailchimp.com/3.0/lists/".$this->list_id."/members",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$this->token,
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 1b309f99-368a-c07f-224a-fe1f9e725b5a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $decoded = json_decode($response);
        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            if(isset($decoded->id)){
                $user->mailchimp_id = $decoded->id;
                $user->is_mailchimp_synced = 1;
                $user->save();
            }
        }

    }

    function update_user($data, $user){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://us19.api.mailchimp.com/3.0/lists/".$this->list_id."/members/".$user->mailchimp_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$this->token,
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 1b309f99-368a-c07f-224a-fe1f9e725b5a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $decoded = json_decode($response);
        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            if(isset($decoded->id)){
                $user->is_mailchimp_synced = 1;
                $user->save();
            }
        }

    }
}