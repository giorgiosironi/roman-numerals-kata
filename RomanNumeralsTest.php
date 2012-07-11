<?php

function toRoman($number)
{
    return str_repeat('I', $number);
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTwoIsConvertedToII()
    {
        $this->assertTrue('II' == toRoman(2));
    }
}
