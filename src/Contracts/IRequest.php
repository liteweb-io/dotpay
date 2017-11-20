<?php

namespace Liteweb\Dotpay\Contracts;

interface IRequest
{
    public function toArray();
    public function method();
    public function path();
}