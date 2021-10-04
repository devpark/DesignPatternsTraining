<?php


namespace App\Shipping\Countries\Us\BoxPricing;

use App\Contracts\IBoxingCalculation;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Shipping\CommonCalculations\BoxPricing\PremiumBox;
use App\Shipping\PriceFactory;

class DefaultBoxUs implements IBoxingCalculation
{
    protected $price_factory ;

    public function __construct()
    {
        $this->price_factory = new PriceFactory();
    }

    public function calculate(IShippingBox $boxing_properties): IPrice
    {
        return $this->price_factory->create("$", $this->getCountryPrice());
    }

    protected function getCountryPrice()
    {
        return 0;
    }
}