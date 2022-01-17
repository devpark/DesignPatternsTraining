<?php
namespace App\Shipping\CommonCalculations;

use App\Contracts\IBoxingCalculation;
use App\Contracts\ICalculationsBuilder;
use App\Contracts\ICountryShippingCalc;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Contracts\IShippingOrder;


abstract class CalculationsBuilder implements ICalculationsBuilder
{
    protected IShippingOrder $order;
    protected ICountryShippingCalc $order_total;
    protected IShippingBox $boxing_properties;

    public function __construct(IShippingOrder $order, ICountryShippingCalc $order_total, IShippingBox $boxing_properties)
    {
        $this->order = $order;
        $this->order_total = $order_total;
        $this->boxing_properties = $boxing_properties;
    }

    public function useShippingDiscounts(ICountryShippingCalc $calculations_component):ICountryShippingCalc
    {
        $free_days_decorator = new FreeDeliveryDays($calculations_component);
        $client_discount_decorator =  new ClientShippingDiscount($free_days_decorator);

        return $client_discount_decorator;
    }

    public function useOrderTotal():ICountryShippingCalc
    {
        return $this->order_total;
    }

    public function makeCalculations(ICountryShippingCalc $calculations_component, IBoxingCalculation $boxing_component): IPrice
    {
        $shipping_cost = $calculations_component->calculate($this->order);
        $boxing_cost =  $boxing_component->calculate($this->boxing_properties);

        //todo
        return $shipping_cost->add($boxing_cost);
    }
}