<?php

namespace RomanNumeral\Helper;

class RomanNumeralConverter
{
    private $_startingNumber;

    const HTML_OVERLINE = '<span style="text-decoration: overline">%s</span>';
    const MAP_NUMERAL = [
        1000000 => 'M',
        500000 => 'D',
        100000 => 'C',
        50000 => 'L',
        10000 => 'X',
        5000 => 'V',
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
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
            foreach (self::MAP_NUMERAL as $int => $romanNumeral) {
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
        string $romanNumeral,
        int $int
    ) : string
    {
        // Add overline
        if ($int > 1000) {
            return sprintf(self::HTML_OVERLINE, $romanNumeral);
        }

        return $romanNumeral;
    }
}