<?php


namespace App\Shipping\AdditionalCalculations;
use \App\Contracts\ICountryShippingCalc;

use App\Contracts\IPrice;
use App\Contracts\IShippingOrder;
use App\Shipping\Price\PriceFactory;

abstract class IAdditionalCalc implements ICountryShippingCalc
{

    protected ICountryShippingCalc $calc;
    protected $price_factory ;

    public function __construct(ICountryShippingCalc $calc)
    {
        $this->calc = $calc;
        $this->price_factory = new PriceFactory();
    }

    public function calculate(IShippingOrder $order): IPrice
    {
        $shipping_cost = $this->calc->calculate($order);
        return $this->decorate($shipping_cost, $order);
    }

    abstract protected function decorate(IPrice $shipping_cost, IShippingOrder $order): IPrice;
}