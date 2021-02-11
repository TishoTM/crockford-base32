<?php
namespace TishoTM\Crockford;

use TishoTM\Crockford\Contracts\NumberInterface;

class Encoder
{
    /**
     * @var \TishoTM\Crockford\Contracts\NumberInterface
     */
    protected $number;
    
    /**
     * Base32 symbols.
     * @var array
     */
    protected $symbols;

    /**
     * Encoding string
     * @var string
     */
    protected $encoded = '';

    /**
     * @param  NumberInterface  $number
     * @param  array  $symbols
     */
    public function __construct(NumberInterface $number, array $symbols)
    {
        $this->number = $number;
        $this->symbols = $symbols;
    }

    /**
     * @param  bool  $checksum - optional
     * @return \TishoTM\Crockford\Encoder
     */
    public function encode(bool $checksum = false): Encoder
    {
        $checkSymbol = '';
        if ($checksum === true) {
            // $numberInstance = Factory::init($number);
            $index = $this->number->mod(37);
            $checkSymbol = $this->symbols[$index];
        }

        if (!$this->number->value()) {
            $this->currentString = '0' . $checkSymbol;
            return $this;
        }

        $encoded = '';
        while ($this->number->value() > 0) {
            $remainder = $this->number->mod(32);
            $this->number->value($this->number->divide(32));
            $encoded = $this->symbols[$remainder] . $encoded;
        }

        $this->encoded = $encoded.$checkSymbol;

        return $this;
    }

    /**
     * @param  int  $chunks
     * @return string
     */
    public function toString(int $chunks = null): string
    {
        return $chunks !== null && $chunks > 0 ? 
            trim(chunk_split($this->encoded, $chunks, '-'), '-') :
            $this->encoded;
    }
}
