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

    public function get_intent_secret(){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $intent = \Stripe\SetupIntent::create();
        $clientSecret = $intent->client_secret;
        return $clientSecret;
    }

    public function charge_card(Request $request)
    {

        $this->getStripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($this->getStripeSecretKey);



        // info("creating stripe transaction for amount: $request->amount");
        try {

            $customer_profile = $request->customer_profile_id;
            $paymentMethodId = $this->getPaymentMethodId($customer_profile);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'customer' => $customer_profile,
                "description" => "SystemName: $request->first_name $request->last_name",
                'payment_method' => $paymentMethodId,
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ]
            ]);

            $customer_profile_id = $customer_profile;
            // info("STRIPE RESULT: " . print_r($charge, 1));


            $data['success'] = true;
            $transaction_id = $paymentIntent->id;
            $data['transaction_id'] = $transaction_id;
            $data['card_data'] = $transaction_id;
            $data['last4'] = "";
            $data['customer_profile_id'] = $customer_profile_id;
            $data['message'] = "Transaction successfully made";
            $data['status'] = "success";
            $data['error'] = "";
            return (object) $data;

        } catch (\Exception $e) {

            // info("stripe charge error " . $e->getMessage());
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

        $stripe = new \Stripe\StripeClient(
            $this->getStripeSecretKey
        );

        $data["last4"] = "";
        $data["exp_month"] = "";
        $data["exp_year"] = "";
        $data["brand"] = "";

        try {

            $response = $stripe->paymentMethods->all([
                'customer' => $cutomer_id,
                'type' => 'card',
                'limit' => 1
            ]);

            if (isset($response->data[0]->card)) {
                $data["exp_month"] = $response->data[0]->card->exp_month;
                $data["exp_year"] = $response->data[0]->card->exp_year;
                $data["brand"] = ucfirst($response->data[0]->card->brand);
                $data["last4"] = $response->data[0]->card->last4;
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

            if ($request->is_customer) {
                
                //Get All payment methods
                $response = $stripe->paymentMethods->all([
                    'customer' => $request->customer_profile_id,
                    'type' => 'card',
                    'limit' => 5
                ]);

                //Delete other cards
                if (isset($response->data)) {
                    foreach ($response->data as $key => $card) {
                        if($card["id"] != $request->objId){ //Do not delete the current card
                            $stripe->paymentMethods->detach(
                                $card["id"],
                                []
                            );
                        }
                    }
                }

                //Attach payment method to customer
                $paymentMethodId = $request->objId;
                $paymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethodId);
                $paymentMethod->attach(['customer' => $request->customer_profile_id]);
 
                
                //Make it the detault payment method
                $customer = Customer::update($request->customer_profile_id, [
                    'email'       => $request->email,
                    'description' => $request->first_name . " " . $request->last_name,
                    [
                        'invoice_settings' => [
                            'default_payment_method' => $request->objId,
                        ],
                    ]
                ]);


            } 
            else {

                //Create customer from intent
                $intent = \Stripe\SetupIntent::retrieve($request->objId);
                $cus_body = [
                    'email'       => $request->email,
                    'description' => $request->first_name . " " . $request->last_name,
                    'payment_method' => $intent->payment_method,
                ];

                $customer = Customer::create($cus_body);
                $customer_profile = $customer->id;
                
                $request->merge([
                    "customer_profile_id" => $customer_profile
                ]);

                User::where("id", Auth::user()->id)->update(["stripe_customer_id" => $customer_profile]);
            }

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function getPaymentMethodId($customer_profile_id){
        
        $this->getStripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($this->getStripeSecretKey);

        $stripe = new \Stripe\StripeClient(
            $this->getStripeSecretKey
        );

        $response = $stripe->paymentMethods->all([
            'customer' => $customer_profile_id,
            'type' => 'card',
            'limit' => 1
        ]);

        return @$response->data[0]["id"];
    }

}
