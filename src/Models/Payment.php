<?php

namespace Liteweb\Dotpay\Models;

class Payment
{
    private $amount;
    private $currency = 'PLN';
    private $description;
    private $control;
    private $language;
    private $ch_lock = 0;
    private $url;
    private $urlc;
    private $expiration_datetime;
    private $payer;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $recipient;
    private $buttontext = 'Return';

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

}