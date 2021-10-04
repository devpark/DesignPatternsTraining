<?php
namespace App;

use App\Contracts\IShippingBox;
use App\Contracts\IShippingOrder;
use App\Orders\BoxingPropertiesAdapter;
use App\Orders\Order;
use App\Orders\ShippingOrderAdapter;
use App\Shipping\CountryCalculators\CountryCalcFactory;
use App\Shipping\ShippingCostCalculator;
use App\Contracts\IPrice;

class Main
{
    public function start($country_code, $total, $discount = 0, $box_type = 'DEFAULT')
    {
        $immutable_order = $this->getOrder($country_code, $total, $discount, $box_type);
        $order_adapter = new ShippingOrderAdapter($immutable_order);
        $boxing_properties = new BoxingPropertiesAdapter($immutable_order);

        $shipping_cost = $this->makeShippingCalcultions($order_adapter, $boxing_properties);

        return $shipping_cost->getFomatedValue();
    }

    private function getOrder($country_code, $total, $discount = 0, $premium_box = false):Order
    {
        return new Order($country_code, $total, $discount, $premium_box);
    }

    private function makeShippingCalcultions(IShippingOrder $order_adapter, IShippingBox $boxing_properties):IPrice
    {
        $calculator_facade = new ShippingCostCalculator();
        return $calculator_facade->calculate($order_adapter, $boxing_properties);
    }
}