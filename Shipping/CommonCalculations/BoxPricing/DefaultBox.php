<?php


namespace App\Shipping\CommonCalculations\BoxPricing;

use App\Contracts\IBoxingCalculation;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Currencies;
use App\Shipping\PriceFactory;

abstract class DefaultBox implements IBoxingCalculation
{
    protected $price_factory ;

    abstract protected function getCountryPrice();
    abstract protected function getCurrency();

    public function __construct()
    {
        $this->price_factory = new PriceFactory();
    }

    public function calculate(IShippingBox $boxing_properties): IPrice
    {
        return $this->price_factory->create($this->getCurrency(), $this->getCountryPrice());
    }


}