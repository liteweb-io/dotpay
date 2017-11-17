<?php
/**
 * Created by PhpStorm.
 * User: kamilfronczak
 * Date: 17.11.2017
 * Time: 17:32
 */

namespace Liteweb\Dotpay\DotpayApi\Utils;

class Payment
{
    private $amount;
    private $currency = 'PLN';
    private $description;
    private $control;
    private $language;
    private $ch_lock;
    private $url;
    private $urlc;
    private $expiration_datetime;
    private $payer;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $recipient;

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