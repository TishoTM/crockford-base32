<?php 
namespace TishoTM\Tests\Number;

use TishoTM\Crockford\Number\Factory;
use TishoTM\Crockford\Number\BigNumber;
use TishoTM\Crockford\Number\PrimitiveNumber;
use TishoTM\Tests\TestBase;

class FactoryTest extends TestBase
{
    public function testInitializingNumberInstance()
    {
        $instance = Factory::init('153090106836332924247685');
        $this->assertInstanceOf(BigNumber::class, $instance);

        $instance = Factory::init('153090106836332924247685', false);
        $this->assertInstanceOf(PrimitiveNumber::class, $instance);

        $instance = Factory::init('100');
        $this->assertInstanceOf(BigNumber::class, $instance);

        $instance = Factory::init('100', false);
        $this->assertInstanceOf(PrimitiveNumber::class, $instance);
    }
}
