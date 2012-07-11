<?php

function romanSystem($firstSymbol, $middleSymbol, $lastSymbol)
{
    return function($number) use ($firstSymbol, $middleSymbol, $lastSymbol) {
        $symbols = array(1 => $firstSymbol,
                         5 => $middleSymbol,
                         10 => $lastSymbol);
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
    };
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->toRoman = romanSystem('I', 'V', 'X');
    }

    public function toRoman($number)
    {
        $toRoman = $this->toRoman;
        return $toRoman($number);
    }

    public function testTheISymbolCanBeRepeated()
    {
        $this->assertEquals('I', $this->toRoman(1));
        $this->assertEquals('II', $this->toRoman(2));
        $this->assertEquals('III', $this->toRoman(3));
    }

    public function testFiveHasItsOwnSymbol()
    {
        $this->assertEquals('V', $this->toRoman(5));
    }

    public function testSmallerSymbolsOnTheRightAreAdditive()
    {
        $this->assertEquals('VI', $this->toRoman(6));
    }

    public function testSmallerSymbolsOnTheLeftAreSubtractive()
    {
        $this->assertEquals('IV', $this->toRoman(4));
    }

    public function testTheVSymbolCannotBeRepeatedTwice()
    {
        $this->assertEquals('IX', $this->toRoman(9));
    }
}
