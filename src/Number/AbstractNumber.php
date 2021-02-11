<?php
namespace TishoTM\Crockford\Number;

use TishoTM\Crockford\Contracts\NumberInterface;

abstract class AbstractNumber implements NumberInterface
{
    /**
     * Constructor.
     * @param  mixed  $value
     */
    public function __construct($value)
    {
        $this->init($value);
    }

    /**
     * Initialize the instance value.
     * @param  mixed  $value
     */
    protected abstract function init($value);
}
