<?php

namespace Liteweb\Dotpay\DotpayApi\Requests;

use Liteweb\Dotpay\Contracts\IRequest;
use Liteweb\Dotpay\DotpayApi\Utils\Payment;

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
    protected $buttontext = 'Return';
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
    }

    public function method()
    {
        return 'POST';
    }

    public function path()
    {
        return 'api/v1/accounts/'.$this->shop_id.'/payment_links/';
    }

}