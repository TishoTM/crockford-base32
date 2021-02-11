<?php
namespace TishoTM\Crockford;

use TishoTM\Crockford\Number\Factory;

class Decoder
{
    /**
     * Decoding/original string
     * @var string
     */
    protected $string;

    /**
     * Decoded value.
     * @var string|int
     */
    protected $decoded;

    /**
     * @var string
     */
    protected $checkSymbol;

    /**
     * The base32 symbols.
     * @var array
     */
    protected $symbols;

    /**
     * Constructor.
     * @param  string  $string
     * @param  array  $symbols
     */
    public function __construct(string $string, array $symbols)
    {
        $this->string = $string;
        $this->symbols = array_flip($symbols);
    }

    /**
     * Decode the string.
     * @param  bool  $checksum - optional
     * 
     * @throws \RuntimeException
     * 
     * @return \TishoTM\Crockford\Decoder
     */
    public function decode(bool $checksum = false): Decoder
    {
        $this->prepare($checksum);
        $value = $this->decodeString();
        $numberInstance = Factory::init($value, Base32::$useBigNumber);

        if ($checksum === true) {
            $checksumValue = $this->decodeChecksum();
            if ($checksumValue !== $numberInstance->mod(37)) {
                throw new \RuntimeException("Checksum symbol '$checksum' is not correct value for '$this->string'");
            }
        }

        $this->decoded = $numberInstance->value();
        
        return $this;
    }

    /**
     * Normalize the string.
     * 
     * Hyphens are removed.
     * 'I', 'i', 'L' or 'l' are converted to '1'
     * 'O' or 'o' are converted to '0'
     * All characters are converted to uppercase
     *
     * @param  string  $string
     * @param  bool  $strict
     * @return string
     *
     * @throws \RuntimeException
     */
    public function normalize(string $string, bool $strict = false): string
    {
        $originalString = $string;

        $string = str_replace('-', '', strtr($string, 'IiLlOo', '111100'));
        $string = strtoupper($string);

        if ($strict === true && $originalString != $string) {
            throw new \RuntimeException("String '$originalString' requires normalization");
        }

        return $string;
    }

    /**
     * Get the decoded result.
     * @return string
     */
    public function toString(): string
    {
        return (string) $this->decoded;
    }

    /**
     * Prepare the original string in case of checksum validation.
     * @param  bool  $checksum
     */
    protected function prepare(bool $checksum)
    {
        if ($checksum === true) {
            $this->checkSymbol = substr($this->string, (strlen($this->string) -1), 1);
            $this->string = substr($this->string, 0, strlen($this->string) - 1);
        }
    }

    /**
     * Decode the encoded string.
     * @return string|int
     */
    protected function decodeString()
    {
        return $this->doDecode($this->string, '/^[A-TV-Z0-9]+$/');
    }

    /**
     * Decode the checksum.
     * @return string|int
     */
    protected function decodeChecksum()
    {
        return $this->doDecode($this->checkSymbol, '/^[A-Z0-9\*\~\$=U]$/');
    }

    /**
     * Validate the characters and decode the string.
     * @throws \RuntimeException
     * @return string|int
     */
    protected function doDecode($string, $validCharactersRegex)
    {
        if ($string === '') {
            return '';
        }

        $string = $this->normalize($string);

        if (!preg_match($validCharactersRegex, $string)) {
            throw new \RuntimeException("String '$string' contains invalid characters");
        }

        $numberInstance = Factory::init(0, Base32::$useBigNumber);
        foreach (str_split($string) as $symbol) {
            $numberInstance->value($numberInstance->multiply(32));
            $numberInstance->value($numberInstance->add($this->symbols[$symbol]));
        }

        return $numberInstance->value();
    }
}
