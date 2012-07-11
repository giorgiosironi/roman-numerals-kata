<?php

function toRoman($number)
{
    $roman = '';
    if ($number >= 5) {
        $roman .= 'V';
        $number -= 5;
    } 
    if ($number > 3) {
        $roman = 'IV';
    } else {
        $roman .= str_repeat('I', $number);
    }
    return $roman;
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTheISymbolCanBeRepeated()
    {
        $this->assertEquals('I', toRoman(1));
        $this->assertEquals('II', toRoman(2));
        $this->assertEquals('III', toRoman(3));
    }

    public function testFiveHasItsOwnSymbol()
    {
        $this->assertEquals('V', toRoman(5));
    }

    public function testSmallerSymbolsOnTheRightAreAdditive()
    {
        $this->assertEquals('VI', toRoman(6));
    }

    public function testSmallerSymbolsOnTheLeftAreSubtractive()
    {
        $this->assertEquals('IV', toRoman(4));
    }
}
