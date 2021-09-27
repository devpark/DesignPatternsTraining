<?php
namespace App\Shipping\CountryCalculators;

use App\Contracts\ICountryShippingCalc;
use App\Contracts\IPrice;
use App\Contracts\IShippingOrder;
use App\Shipping\Price\PriceUk;

class CalcUk implements ICountryShippingCalc
{
    public function calculate(IShippingOrder $order):IPrice
    {
        $total = $order->getTotalUk();

        if($total > 300)
        {
            return new PriceUk(0);
        }
        //there will be more logic in the future
        return  new PriceUk(25);
    }
}