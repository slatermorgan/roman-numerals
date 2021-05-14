<?php

namespace RomanNumeral\Helper;

class RomanNumeralConverter
{
    private $_startingNumber;

    const HTML_OVERLINE = '<span style="text-decoration: overline">%s</span>';
    const MAP_NUMERAL = [
        'uM' => 1000000,
        'uD' => 500000,
        'uC' => 100000,
        'uL' => 50000,
        'uX' => 10000,
        'uV' => 5000,
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public function __construct(int $number)
    {
        $this->_startingNumber = $number;
    }

    public function getRomanNumeral() : string
    {
        $returnString = '';
        $number = $this->_startingNumber;

        while ($number > 0) {
            foreach (self::MAP_NUMERAL as $romanNumeral => $int) {

                if ($number >= $int) {
                    $number -= $int;
                    $returnString .= $this->_formatNumeral($romanNumeral, $int);

                    break;
                }
            }
        }

        return $returnString;
    }

    private function _formatNumeral(
        int $romanNumeral
    ) : string
    {
        if ($romanNumeral[0] === 'u') {
            return sprintf(self::HTML_OVERLINE, substr($romanNumeral, 1));
        }

        return $romanNumeral;
    }
}