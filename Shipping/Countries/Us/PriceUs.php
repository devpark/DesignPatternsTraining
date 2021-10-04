<?php
namespace App\Shipping\Countries\Us;

use App\Contracts\IPrice;
use App\Shipping\CommonCalculations\Price;

class PriceUs extends Price
{
    private $currency_code = '$';

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    public function getFomatedValue()
    {
        return $this->currency_code.$this->value;
    }
}