<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

Interface GatewayAdapterInterface
{
    /**
     * @param Request $request
     * @return mixed
     */

    public function get_intent_secret();
    public function charge_card(Request $request);
    public function get_customer($customer_id);
    public function update_customer(Request $request);
    
}
