<?php


namespace App\Shipping\CommonCalculations\BoxPricing;


use App\Contracts\IBoxingCalculation;
use App\Contracts\ICountryShippingCalc;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Contracts\IShippingOrder;
use App\Shipping\PriceFactory;


abstract class PremiumBox implements IBoxingCalculation
{
    abstract protected function getCurrentType();
    abstract protected function getCountryPrice();
    protected IBoxingCalculation $default_price;

    protected $price_factory ;

    public function __construct(IBoxingCalculation $calculations_component)
    {
        $this->default_price = $calculations_component;
        $this->price_factory = new PriceFactory();
    }

    public function calculate(IShippingBox $boxing_properties): IPrice
    {
        $shipping_cost = $this->default_price->calculate($boxing_properties);
        return $this->decorate($shipping_cost, $boxing_properties);
    }

    protected function decorate(IPrice $shipping_cost, IShippingBox $boxing_properties):IPrice
    {
        if($boxing_properties->getType() ===  $this->getCurrentType())
        {
            $price_summary = $shipping_cost->getValue() + $this->getCountryPrice();
            $shipping_cost = $this->price_factory->create($shipping_cost->getCurrencyCode(), $price_summary);
        }

        return $shipping_cost;
    }
}