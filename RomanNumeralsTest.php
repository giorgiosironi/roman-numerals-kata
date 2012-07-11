<?php

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testOneIsConvertedToI()
    {
        $this->assertTrue('I' == toRoman(1));
    }
}
