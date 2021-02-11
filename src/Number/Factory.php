<?php
namespace TishoTM\Crockford\Number;

use TishoTM\Crockford\Contracts\NumberInterface;
use TishoTM\Crockford\Number\BigNumber;
use TishoTM\Crockford\Number\PrimitiveNumber;

class Factory
{
    /**
     * Check what instance we need.
     * By default will initialize BigNumber instance.
     * 
     * @param  string|int  $number
     * @param  bool  $useBigNumber
     * 
     * @return NumberInterface
     */
    public static function init($number, bool $useBigNumber = true): NumberInterface
    {
        return $useBigNumber === false ? 
            new PrimitiveNumber($number) : new BigNumber($number);
    }
}
