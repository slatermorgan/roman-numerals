<?php

namespace RomanNumeral\Helper;

class RomanNumeralConverter
{
    private $_startingNumber;

    const HTML_OVERLINE = '<span style="text-decoration: overline">%s</span>';
    const MAP_NUMERAL = [
        1000000 => 'uM',
        500000 => 'uD',
        100000 => 'uC',
        50000 => 'uL',
        10000 => 'uX',
        5000 => 'uV',
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
        string $romanNumeral
    ) : string
    {
        if ($romanNumeral[0] === 'u') {
            return sprintf(self::HTML_OVERLINE, substr($romanNumeral, 1));
        }

        return $romanNumeral;
    }
}