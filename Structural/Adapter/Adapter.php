<?php

class Calculator
{
    public function multiplyArray($array) {
        $sum = 1;
        for ($i=0; $i < count($array); $i++) { 
            $sum *= $array[$i];
        }
        return $sum;
    }
}

interface FinancialCalculator 
{
    public function profitPerMonth($array)
}

class FinancialAdapter implements FinancialCalculator
{
    private $_calc;

    public function __construct(Calculator $calc) {
        $this->_calc = $calc;
    }

    public function profitPerMonth($array) {
        return $this->_calc->multiplyArray($array);
    }
}
?>