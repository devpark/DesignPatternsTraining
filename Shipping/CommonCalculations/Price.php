<?php


namespace App\Shipping\CommonCalculations;


use App\Contracts\IPrice;

abstract class Price implements \App\Contracts\IPrice
{
    protected $value;

    public function add(IPrice $value): IPrice
    {
        if($value->getCurrencyCode() === $this->getCurrencyCode())
        {
            $this->value = $value->getValue() + $this->getValue();
            return $this;
        }

        throw new \Exception("Trying to add different currencies is not allowed");
    }
}