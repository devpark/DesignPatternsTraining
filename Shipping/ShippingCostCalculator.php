<?php
namespace App\Shipping;

use App\Contracts\ICountryShippingCalc;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Contracts\IShippingOrder;

use App\Shipping\Countries\Us\PriceUs;

class ShippingCostCalculator
{
    public function calculate(IShippingOrder $order, IShippingBox $boxing_properties):IPrice
    {
        $calc_factory = new CountryCalcFactory();
        $country_calculations_builder = $calc_factory->create($order, $boxing_properties);
        $calculations_director = new CalculationsDirector($country_calculations_builder);

        return $calculations_director->calculate();
    }
}