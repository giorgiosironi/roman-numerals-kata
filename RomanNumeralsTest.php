<?php

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testTwoIsConvertedToII()
    {
        $this->assertTrue('II' == toRoman(2));
    }
}
