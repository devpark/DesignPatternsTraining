<?php


namespace App\Shipping\Countries\Uk\BoxPricing;

use App\Contracts\IBoxingCalculation;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\PremiumBox;
use App\Shipping\PriceFactory;

class DefaultBoxUk implements IBoxingCalculation
{
    protected $price_factory ;

    public function __construct()
    {
        $this->price_factory = new PriceFactory();
    }

    public function calculate(IShippingBox $boxing_properties): IPrice
    {
        return $this->price_factory->create(Currencies::GBP, $this->getCountryPrice());
    }

    protected function getCountryPrice()
    {
        return 0;
    }
}