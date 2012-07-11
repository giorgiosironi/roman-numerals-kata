<?php

function toRoman($number)
{
    return str_repeat('I', $number);
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTheIntervalOneToThreeIsConverted()
    {
        $this->assertTrue('I' == toRoman(1));
        $this->assertTrue('II' == toRoman(2));
        $this->assertTrue('III' == toRoman(3));
    }
}
