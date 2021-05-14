<?php

namespace RomanNumeral\Helper;

class RomanNumeralConverter
{
    const MAP_NUMERAL = [
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

    public static function getRomanNumeral(int $number) : string
    {
        $returnString = '';

        while ($number > 0) {
            foreach (self::MAP_NUMERAL as $romanNumeral => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnString .= $romanNumeral;

                    break;
                }
            }
        }

        return $returnString;
    }
}