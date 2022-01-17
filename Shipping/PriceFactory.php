<?php
namespace App\Shipping;

use App\Contracts\IPrice;
use App\Countries;
use App\Currencies;
use App\Shipping\Countries\OtherCountries\PriceWorld;
use App\Shipping\Countries\Pl\PricePl;
use App\Shipping\Countries\Uk\PriceUk;
use App\Shipping\Countries\Us\PriceUs;

class PriceFactory
{
    public function create($country_code, float $value):IPrice
    {
        switch ($country_code)
        {
            case Currencies::PLN:
                return new PricePl($value);

            case Currencies::GBP:
                return new PriceUk($value);

            case Currencies::US:
                return new PriceUs($value);

            default:
                return new PriceWorld($value);
        }
    }
}