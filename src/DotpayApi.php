<?php

namespace Liteweb\Dotpay;

use ErrorException;
use Liteweb\Dotpay\Http\Client;
use Liteweb\Dotpay\Models\DotpayCallback;
use Liteweb\Dotpay\Requests\CreatePaymentLink;
use Liteweb\Dotpay\Responses\CreatePaymentResponse;
use Liteweb\Dotpay\Utils\Validator;

class DotpayApi
{
    private $config;
    private $client;
    private $validator;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client($this->config['username'], $this->config['password'], $this->config['base_url']);
        $this->validator = new Validator($this->config['pin']);
    }

    public function createPayment($payment)
    {
        return new CreatePaymentResponse($this->client->makeRequest(new CreatePaymentLink($this->config, $payment)));
    }

    public function verifyCallback(DotpayCallback $data)
    {
        if ($this->validator->verify($data)) {
            return new DotpayCallback($data);
        }

        throw new ErrorException('invalid_hash');
    }
}