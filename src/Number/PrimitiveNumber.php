<?php
namespace TishoTM\Crockford\Number;

use TishoTM\Crockford\Contracts\NumberInterface;

class PrimitiveNumber extends AbstractNumber implements NumberInterface
{
    protected $value = 0;

    /**
     * Initialize the primitive.
     * @param  mixed  $value
     */
    protected function init($value)
    {
        if (!is_numeric($value)) {
            throw new \RuntimeException("Specified number $value} is not numeric");
        }
        $this->value = $value;
    }

    /**
     * Finds the modulus of the current number divided by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function mod($number)
    {
        return $this->value % $number;
    }

    /**
     * Divides the current number by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function divide($number)
    {
        return $this->value / $number;
    }

    /**
     * Multiplies the current number by the given number
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function multiply($number)
    {
        return $this->value * $number;
    }

    /**
     * Adds the given number to the current number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function add($number)
    {
        return $this->value + $number;
    }

    /**
     * Get/Set the value of the number.
     * @param  mixed  $value - string representation of a base 10 number
     * @return mixed
     */
    public function value($value = null)
    {
        if ($value !== null) {
            $this->init($value);
        }
        return $this->value;
    }
}
