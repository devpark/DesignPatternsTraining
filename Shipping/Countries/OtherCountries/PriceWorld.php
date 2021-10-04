<?php
namespace App\Shipping\Countries\OtherCountries;

use App\Contracts\IPrice;
use App\Currencies;
use App\Shipping\CommonCalculations\Price;

class PriceWorld extends Price
{
    private $currency_code = Currencies::ETH;

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