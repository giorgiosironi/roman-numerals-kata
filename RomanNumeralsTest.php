<?php

function romanCipher($firstSymbol, $middleSymbol, $lastSymbol)
{
    return function($number) use ($firstSymbol, $middleSymbol, $lastSymbol) {
        if ($number == 0) {
            return '';
        }
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
        $this->toRoman = function($number) {
            $ciphers = array(
                '1' => romanCipher('I', 'V', 'X'),
                '2' => romanCipher('X', 'L', 'C'),
                '3' => romanCipher('C', 'D', 'M'),
                '4' => romanCipher('M', '?', '?'),
            );
            $arabic = (string) $number;
            $fullRoman = '';
            for ($i = 0; $i < strlen($arabic); $i++) {
                $position = strlen($arabic) - $i;
                $cipher = $ciphers[$position];
                $fullRoman .= $cipher($arabic{$i});
            }
            return $fullRoman;
        };
    }

    public function toRoman($number)
    {
        $toRoman = $this->toRoman;
        return $toRoman($number);
    }

    public function testZeroHasNoRomanRepresentation()
    {
        $this->assertEquals('', $this->toRoman(0));
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

    public function testNumbersGreaterThan10CanBeDividedIntoCiphers()
    {
        $this->assertEquals('XX' . 'IX', $this->toRoman(29));
        $this->assertEquals('XL' . 'VIII', $this->toRoman(48));
        $this->assertEquals('LX' . 'IV', $this->toRoman(64));
        $this->assertEquals('LXX' . 'II', $this->toRoman(72));
        $this->assertEquals('XC' . 'IX', $this->toRoman(99));
    }

    public function testEvenNumbersGreaterThan100CanBeDividedIntoCiphers()
    {
        $this->assertEquals('C' . 'XX' . 'IV', $this->toRoman(124));
        $this->assertEquals('CM' . 'XC' . 'IX', $this->toRoman(999));
    }

    public function testNumbersBetween1000And3999CanBeRepresentedWithoutAnAdditionalMiddleSymbol()
    {
        $this->assertEquals('MM' . 'XL' . 'II', $this->toRoman(2042));
        $this->assertEquals('MMM' . 'CM' . 'XC' . 'IX', $this->toRoman(3999));
    }
}
