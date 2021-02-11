<?php
namespace TishoTM\Crockford\Number;

use Moontoast\Math\BigNumber as MathBigNumber;
use TishoTM\Crockford\Contracts\NumberInterface;

class BigNumber extends AbstractNumber implements NumberInterface
{
    /**
     * @var \Moontoast\Math\BigNumber
     */
    protected $value;

    /**
     * Init the number.
     * @param  int|string|\Moontoast\Math\BigNumber  $value
     */
    protected function init($value)
    {
        if (!$value instanceof MathBigNumber) {
            $value = new MathBigNumber($value);
        }
        $this->value = $value;
    }

    /**
     * Finds the modulus of the current number divided by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return string - string representation of the number in base 10
     */
    public function mod($number)
    {
        return $this->clone()->mod($number)->getValue();
    }

    /**
     * Divides the current number by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return string - string representation of the number in base 10
     */
    public function divide($number)
    {
        return $this->clone()->divide($number)->getValue();
    }

    /**
     * Multiplies the current number by the given number
     * @param  mixed  $number - string representation of a base 10 number
     * @return string - string representation of the number in base 10
     */
    public function multiply($number)
    {
        return $this->clone()->multiply($number)->getValue();
    }

    /**
     * Adds the given number to the current number.
     * @param  mixed $number - string representation of a base 10 number
     * @return string - string representation of the number in base 10
     */
    public function add($number)
    {
        return $this->clone()->add($number)->getValue();
    }

    /**
     * Set/Get the value.
     * @return string
     * @return string - string representation of the number in base 10
     */
    public function value($value = null)
    {
        if ($value !== null) {
            $this->init($value);
        }
        return $this->value->getValue();
    }

    /**
     * @return \Moontoast\Math\BigNumber
     */
    protected function clone(): MathBigNumber
    {
        return clone $this->value;
    }
}
