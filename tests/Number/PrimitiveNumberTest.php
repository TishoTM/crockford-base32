<?php 
namespace TishoTM\Tests\Number;

use TishoTM\Crockford\Number\PrimitiveNumber;
use TishoTM\Tests\TestBase;

class PrimitiveNumberTest extends TestBase
{
    /**
     * Test init.
     */
    public function testInitialize()
    {
        $integer = new PrimitiveNumber(123);
        $this->assertEquals(123, $integer->value());
    }

    /**
     * Test setting the value.
     */
    public function testSettingValue()
    {
        $integer = new PrimitiveNumber(123);
        $newValue = $integer->value(321);
        $this->assertEquals(321, $newValue);
        $this->assertEquals(321, $integer->value());
    }

    /**
     * Test division.
     */
    public function testDivision()
    {
        $integer = new PrimitiveNumber(12);
        $this->assertEquals(6, $integer->divide(2));
    }

    /**
     * Test mod.
     */
    public function testMod()
    {
        $integer = new PrimitiveNumber(10);
        $this->assertEquals(1, $integer->mod(3));
    }

    /**
     * Test add.
     */
    public function testAdd()
    {
        $integer = new PrimitiveNumber(10);
        $this->assertEquals(15, $integer->add(5));
    }

    /**
     * Test multiply.
     */
    public function testMultiply()
    {
        $integer = new PrimitiveNumber(10);
        $this->assertEquals(50, $integer->multiply(5));
    }
}
