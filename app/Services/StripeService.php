<?php

namespace App\Services;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Token;
use Auth;
use App\Services\Interfaces\GatewayAdapterInterface;

class StripeService implements GatewayAdapterInterface
{

    private $getStripeSecretKey;
    public function __construct()
    {
        
    }

    public function charge_card(Request $request)
    {

        $this->getStripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($this->getStripeSecretKey);

        try {

            if (!$request->charge_customer) {
                
                $request->cnumber = str_replace(" ", "", $request->cnumber);
                $token = \Stripe\Token::create([
                    'card' => [
                        'number'    => $request->cnumber,
                        'exp_month' => $request->card_expiry_month,
                        'exp_year'  => $request->card_expiry_year,
                        'cvc'       => $request->cvv,
                    ],
                ]);

                $customer = Customer::create(array(
                    'email'       => $request->email,
                    'description' => $request->first_name . " " . $request->last_name,
                    'source'      => $token['id'],
                ));

                $customer_profile = $customer->id;
            } else {
                $customer_profile = $request->customer_profile_id;
            }

            $charge = Charge::create(array(
                "description" => env("SITE_NAME") . " $request->plan_title ($request->first_name $request->last_name) ",
                'amount'      => $request->amount * 100,
                'currency'    => 'usd',
                'customer'    => $customer_profile,
            ));


            $customer_profile_id = $customer_profile;
            $data['success'] = true;
            $transaction_id = $charge->id;
            $card_last_four = $charge->source->last4;
            $data['transaction_id'] = $transaction_id;
            $data['card_data'] = $charge->source->id;;
            $data['last4'] = $card_last_four;
            $data['customer_profile_id'] = $customer_profile_id;
            $data['message'] = "Transaction successfully made";
            $data['status'] = "success";
            $data['error'] = "";
            return (object) $data;
        } catch (\Exception $e) {

            $data['success'] = false;
            $data['status'] = "error";
            $data['transactionId'] = 0;
            $data['last4'] = 0;
            $data['customerProfile'] = "";
            $data['customerProfilePayment'] = "";
            $data['error'] = "ERROR: " . $e->getMessage();

            return (object) $data;
        }
    }


    public function get_customer($cutomer_id)
    {

        $this->getStripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($this->getStripeSecretKey);

        $stripe = new \Stripe\StripeClient(
            $this->getStripeSecretKey
        );

        $data["last4"] = "";
        $data["brand"] = "";
        try {

            $response = $stripe->customers->allSources(
                $cutomer_id,
                ['object' => 'card', 'limit' => 1]
            );

            if (isset($response->data[0])) {
                $data["brand"] = $response->data[0]->brand;
                $data["last4"] = $response->data[0]->last4;
            }
        } catch (\Exception $e) {
        }

        return $data;
    }


    public function update_customer(Request $request)
    {
        
        $this->getStripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($this->getStripeSecretKey);

        $stripe = new \Stripe\StripeClient(
            $this->getStripeSecretKey
        );


        try {
            $request->cnumber = str_replace(" ", "", $request->cnumber);
            $token = \Stripe\Token::create([
                'card' => [
                    'number'    => $request->cnumber,
                    'exp_month' => $request->card_expiry_month,
                    'exp_year'  => $request->card_expiry_year,
                    'cvc'       => $request->cvv,
                ],
            ]);

            if ($request->is_customer) {

                $response = $stripe->customers->allSources(
                    $request->customer_profile_id,
                    ['object' => 'card', 'limit' => 1]
                );

                if (isset($response->data[0])) {
                    $stripe->customers->deleteSource(
                        $request->customer_profile_id,
                        $response->data[0]->id,
                        []
                    );
                }

                $customer = \Stripe\Customer::update($request->customer_profile_id, [
                    'source' => $token,
                ]);

            } 
            else {

                $customer = Customer::create(array(
                    'email'       => $request->email,
                    'description' => $request->first_name . " " . $request->last_name,
                    'source'      => $token['id'],
                ));

                $customer_profile = $customer->id;
                User::where("id", Auth::user()->id)->update(["stripe_customer_id" => $customer_profile]);
            }

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }

}
