<?php

namespace Liteweb\Dotpay\DotpayApi\Utils;

class CreatePaymentResponse
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getPaymentUrl()
    {
        return $this->data->payment_url;
    }

}