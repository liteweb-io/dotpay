<?php

namespace Liteweb\Dotpay\DotpayApi;

use Dotenv\Exception\InvalidCallbackException;
use Liteweb\Dotpay\DotpayApi\Http\Client;
use Liteweb\Dotpay\DotpayApi\Requests\CreatePaymentLink;
use Liteweb\Dotpay\DotpayApi\Utils\CreatePaymentResponse;
use Liteweb\Dotpay\DotpayApi\Utils\DotpayCallback;

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

        throw new InvalidCallbackException('invalid_hash');
    }
}