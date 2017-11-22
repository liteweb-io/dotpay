<?php

namespace Liteweb\Dotpay\Requests;

use Liteweb\Dotpay\Contracts\IRequest;
use Liteweb\Dotpay\Models\Payment;

class CreatePaymentLink extends AbstractRequest implements IRequest
{
    protected $amount;
    protected $currency;
    protected $description;
    protected $control;
    protected $language;
    protected $onlinetransfer = 1;
    protected $ch_lock;
    protected $redirection_type = 0;
    protected $buttontext;
    protected $url;
    protected $urlc;
    protected $expiration_datetime;
    protected $payer = [];
    protected $recipient = [];

    public function __construct($config, Payment $payment)
    {
        parent::__construct($config['shop_id']);

        foreach ($payment->toArray() as $key => $value) {
            $this->$key = $value;
        }

        if (empty($this->url)) {
            $this->url = $config['url'];
        }

        if (empty($this->urlc)) {
            $this->urlc = $config['curl'];
        }

        if (empty($this->expiration_datetime)) {
            $this->expiration_datetime = $config['expiration_datetime'];
        }

        if (empty($this->recipient)) {
            $this->recipient = $config['recipient'];
        }
    }

    public function method()
    {
        return 'POST';
    }

    public function path()
    {
        return 'api/v1/accounts/' . $this->shop_id . '/payment_links/';
    }

}