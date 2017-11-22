<?php

namespace Liteweb\Dotpay\Models;

class DotpayCallback
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getControl()
    {
        return $this->data['control'];
    }

    public function getOperationNumber()
    {
        return $this->data['operation_number'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getOperationAmount()
    {
        return $this->data['operation_amount'];
    }

    public function getOperationDateTime()
    {
        return $this->data['operation_datetime'];
    }

    public function getOperationStatus()
    {
        return $this->data['operation_status'];
    }

    public function isCompleted()
    {
        return $this->getOperationStatus() == 'completed';
    }

    public function isRejected()
    {
        return $this->getOperationStatus() == 'rejected';
    }

    public function toArray()
    {
        return $this->data;
    }

}