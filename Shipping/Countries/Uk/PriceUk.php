<?php
namespace App\Shipping\Countries\Uk;

use App\Contracts\IPrice;
use App\Shipping\CommonCalculations\Price;

class PriceUk extends Price
{
    private $currency_code = 'GBP';

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
        return $this->value.$this->currency_code;
    }
}