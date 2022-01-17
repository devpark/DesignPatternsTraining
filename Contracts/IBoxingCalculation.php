<?php


namespace App\Contracts;


interface IBoxingCalculation
{
    public function calculate(IShippingBox $boxing_properties):IPrice;
}