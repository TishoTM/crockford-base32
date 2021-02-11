<?php
namespace TishoTM\Crockford;

use TishoTM\Crockford\Number\Factory;

class Base32
{
    protected static $symbols = [
        '0', '1', '2', '3', '4',
        '5', '6', '7', '8', '9',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
        'J', 'K', 'M', 'N', 'P', 'Q', 'R', 'S',
        'T', 'V', 'W', 'X', 'Y', 'Z',
        '*', '~', '$', '=', 'U',
    ];

    /**
     * @var bool
     */
    public static $useBigNumber = true;

    /**
     * Encode a number.
     * @param  int|string
     * @param  bool  $checksum - optional
     * @param  int  $chunks - optional
     * 
     * @throws \RuntimeException
     * 
     * @return string
     */
    public static function encode($number, bool $checksum = false, int $chunks = null): string
    {
        if (!is_numeric($number)) {
            throw new \RuntimeException("Specified number $number is not numeric");
        }
        $numberInstance = Factory::init($number, static::$useBigNumber);
        $encoder = new Encoder($numberInstance, static::$symbols);
        return $encoder->encode($checksum)->toString($chunks);
    }

    /**
     * Decode a string.
     * 
     * @param  string  $string
     * @param  bool  $checksum
     * @return int|string
     */
    public static function decode(string $string, bool $checksum = false)
    {
        $decoder = new Decoder($string, self::$symbols);
        return $decoder->decode($checksum)->toString();
    }

    /**
     * Normalize a string.
     *
     * @param  string  $string
     * 
     * @throws \RuntimeException
     * 
     * @return string
     */
    public static function normalize($string): string
    {
        $decoder = new Decoder($string, self::$symbols);
        return $decoder->normalize($string, true);
    }
}
