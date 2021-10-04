<?php


namespace App\Shipping\Countries\Uk\BoxPricing;

use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\DefaultBox;

class DefaultBoxUk extends DefaultBox
{
    protected function getCountryPrice()
    {
        return 0;
    }

    protected function getCurrency()
    {
        return Currencies::GBP;
    }
}