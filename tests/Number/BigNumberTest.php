<?php 
namespace TishoTM\Tests\Number;

use TishoTM\Crockford\Number\BigNumber;
use TishoTM\Tests\TestBase;

class BigNumberTest extends TestBase
{
    /**
     * Test init.
     */
    public function testInitialize()
    {
        $number = new BigNumber(123);
        $this->assertEquals(123, $number->value());

        $number = new BigNumber('153090106836332924247685');
        $this->assertEquals('153090106836332924247685', $number->value());
    }

    /**
     * Test setting the value.
     */
    public function testSettingValue()
    {
        $number = new BigNumber('153090106836332924247685');
        $newValue = $number->value('153090106836332924247685');
        $this->assertEquals('153090106836332924247685', $newValue);
        $this->assertEquals('153090106836332924247685', $number->value());
    }

    /**
     * Test division.
     */
    public function testDivision()
    {
        $number = new BigNumber('100000000000000000000000');
        $this->assertEquals('20000000000000000000000', $number->divide(5));

        $number = new BigNumber(100);
        $this->assertEquals(50, $number->divide(2));

        $number = new BigNumber('50');
        $this->assertEquals(25, $number->divide(2));

    }

    /**
     * Test mod.
     */
    public function testMod()
    {
        $number = new BigNumber('100000000000000000000000');
        $this->assertEquals(1, $number->mod(3));

        $number = new BigNumber(10);
        $this->assertEquals(1, $number->mod(3));
    }

    /**
     * Test add.
     */
    public function testAdd()
    {
        $number = new BigNumber('100000000000000000000000');
        $this->assertEquals('100000000000000000000005', $number->add(5));
    }

    /**
     * Test multiply.
     */
    public function testMultiply()
    {
        $number = new BigNumber('100000000000000000000000');
        $this->assertEquals('200000000000000000000000', $number->multiply(2));
    }
}
