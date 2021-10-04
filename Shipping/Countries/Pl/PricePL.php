<?php
namespace App\Shipping\Countries\Pl;

use App\Contracts\IPrice;
use App\Shipping\CommonCalculations\Price;

class PricePl extends Price implements IPrice
{
    private $currency_code = 'PLN';

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