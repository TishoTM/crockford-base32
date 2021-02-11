<?php
namespace TishoTM\Crockford\Contracts;

interface NumberInterface {

    /**
     * Finds the modulus of the current number divided by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function mod($number);

    /**
     * Divides the current number by the given number.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function divide($number);

    /**
     * Multiplies the current number by the given number
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function multiply($number);

    /**
     * Adds the given number to the current number.
     * @param  mixed $number - string representation of a base 10 number
     * @return mixed
     */
    public function add($number);

    /**
     * Set/Get the value.
     * @param  mixed  $number - string representation of a base 10 number
     * @return mixed
     */
    public function value($value = null);
}
