<?php
function toRoman($number)
{
    $result = '';
    $symbols = array(1000 => 'M', 900 => 'CM', 100 => 'C', '90' => 'XC', 10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I');

    foreach ($symbols as $value => $symbol) {
        while ($number >= $value) {
            $result .= $symbol;
            $number -= $value;
        }
    }
    return $result;
}

class RomanNumberTest extends PHPUnit_Framework_TestCase
{
    public function testNumbersFrom1To3AreConvertedWithIs()
    {
        $this->assertEquals('I', toRoman(1));
        $this->assertEquals('II', toRoman(2));
    }

    public function test4IsConvertedInIV()
    {
        $this->assertEquals('IV', toRoman(4));
    }

    public function testNumbersFrom5To8AreConvertedToVPlusSomeIs()
    {
        $this->assertEquals('V', toRoman(5));
        $this->assertEquals('VI', toRoman(6));
    }

    public function test9IsConvertedInIX()
    {
        $this->assertEquals('IX', toRoman(9));
    }

    public function testNumbersFrom10To13AreConvertedToXPlusSomeIs()
    {
        $this->assertEquals('X', toRoman(10));
        $this->assertEquals('XI', toRoman(11));
        $this->assertEquals('XIII', toRoman(13));
    }

    public function test14IsConvertedInXIV()
    {
        $this->assertEquals('XIV', toRoman(14));
    }

    public function test98IsConvertedInSomething()
    {
        $this->assertEquals('XC' . 'VIII', toRoman(98));
    }


    public function test1999IsConvertedInMCMXCIX()
    {
        $this->assertEquals('M' . 'CM' . 'XC' . 'IX', toRoman(1999));
    }
}
