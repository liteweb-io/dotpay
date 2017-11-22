<?php

namespace Liteweb\Dotpay\Responses;

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

    public function getPayer()
    {
        return $this->data->payer;
    }

    public function getRecipient()
    {
        return $this->data->recipient;
    }

    public function getToken()
    {
        return $this->data->token;
    }

}