<?php
namespace TishoTM\Tests;

use TishoTM\Crockford\Base32;

class Base32Test extends TestBase
{
    /**
     * Test encoding a small number.
     */
    public function testEncodingSmallValue()
    {
        $this->assertEquals('3VC', Base32::encode(123, true));
        $this->assertEquals('3V', Base32::encode(123, false));
        $this->assertEquals('3-V-C', Base32::encode(123, true, 1));
    }

    /**
     * Test encoding a small number.
     */
    public function testEncodingSmallValueWithNonNumber()
    {
        $this->expectException('RuntimeException');
        Base32::encode('aaa', true);
    }

    /**
     * Test encoding a big number.
     */
    public function testEncodingBigValue()
    {
        $numberValue = '153090106836332924247685';

        $this->assertEquals('41NGG155FW7XC7M56', Base32::encode($numberValue, true));
        $this->assertEquals('41NGG-155FW-7XC7M-56', Base32::encode($numberValue, true, 5));

        $this->assertEquals('41NGG155FW7XC7M5', Base32::encode($numberValue, false));
        $this->assertEquals('41NGG-155FW-7XC7M-5', Base32::encode($numberValue, false, 5));
    }

    /**
     * Test decoding a small number.
     */
    public function testDecodingSmallValue()
    {
        $this->assertEquals('123', Base32::decode('3VC', true));
        $this->assertEquals('123', Base32::decode('3V', false));
    }

    /**
     * Test decoding long string.
     */
    public function testDecodingBigValue()
    {
        $encodedWithChecksum = '41NGG155FW7XC7M56';

        $this->assertEquals('153090106836332924247685', Base32::decode($encodedWithChecksum, true));
        $this->assertEquals('153090106836332924247685', Base32::decode('41ngg-155fw-7xc7m-56', true));
        $this->assertNotEquals('253090106836332924247685', Base32::decode($encodedWithChecksum, true));

        $encodedWithoutChecksum = '41NGG155FW7XC7M5';

        $this->assertEquals('153090106836332924247685', Base32::decode($encodedWithoutChecksum, false));
        $this->assertEquals('153090106836332924247685', Base32::decode('41ngg-155fw-7xc7m-5', false));
        $this->assertNotEquals('253090106836332924247685', Base32::decode($encodedWithoutChecksum, false));
    }

    /**
     * Test decoding a string without matching checksum symbol.
     */
    public function testDecodingNotMatchingChecksum()
    {
        $this->expectException('RuntimeException');
        $encodedWithoutChecksum = '41NGG155FW7XC7M5';
        Base32::decode($encodedWithoutChecksum, $validateChecksum = true);
    }

    /**
     * Test normalizing encoded string.
     * With exception.
     */
    public function testNormalizingEncodedString()
    {
        $this->assertEquals('41NGG155FW7XC7M56', Base32::normalize('41NGG155FW7XC7M56'));
    }

    /**
     * Test normalizing encoded string.
     * With exception.
     */
    public function testNormalizingEncodedStringException()
    {
        $this->expectException('RuntimeException');
        Base32::normalize('41ngg-155fw-7xc7m-56');
    }
}
