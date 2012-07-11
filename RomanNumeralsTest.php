<?php

function toRoman($number)
{
    $firstSymbol = 'I';
    $symbols = array(1 => $firstSymbol, 5 => 'V', 10 => 'X');
    $roman = '';
    foreach ($symbols as $denomination => $symbol) {
        if ($number == $denomination - 1) {
            return $firstSymbol . $symbol;
        }
    }
    foreach (array_reverse($symbols, true) as $denomination => $symbol) {
        while ($number >= $denomination) {
            $roman .= $symbol;
            $number -= $denomination;
        } 
    }
    return $roman;
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function toRoman($number)
    {
        return toRoman($number);
    }

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

    public function testTheVSymbolCannotBeRepeatedTwice()
    {
        $this->assertEquals('IX', toRoman(9));
    }
}
