<?php

function toRoman($number)
{
    $roman = '';
    if ($number >= 5) {
        $roman .= 'V';
        $number -= 5;
    } 
    $roman .= str_repeat('I', $number);
    return $roman;
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTheIntervalOneToThreeIsConverted()
    {
        $this->assertEquals('I', toRoman(1));
        $this->assertEquals('II', toRoman(2));
        $this->assertEquals('III', toRoman(3));
    }

    public function testFiveIsConverted()
    {
        $this->assertEquals('V', toRoman(5));
    }

    public function testSixIsConverted()
    {
        $this->assertEquals('VI', toRoman(6));
    }
}
