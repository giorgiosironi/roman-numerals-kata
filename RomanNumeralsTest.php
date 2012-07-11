<?php

function toRoman($number)
{
    return str_repeat('I', $number);
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTheIntervalOneToThreeIsConverted()
    {
        $this->assertEquals('I', toRoman(1));
        $this->assertEquals('II', toRoman(2));
        $this->assertEquals('III', toRoman(3));
    }
}
