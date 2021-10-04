<?php
namespace App\Contracts;

interface ICalculationsBuilder
{
    public function useOrderTotal():ICountryShippingCalc;
    public function useShippingDiscounts(ICountryShippingCalc $calculations_component):ICountryShippingCalc;
    public function useBoxPricing():IBoxingCalculation;
    public function makeCalculations(ICountryShippingCalc $calculations_component, IBoxingCalculation $boxing_component):IPrice;
}