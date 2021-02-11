# Crockford Base32

"Base 32 is a textual 32-symbol notation for expressing numbers in a form that can be conveniently and accurately transmitted between humans and computer systems. It can be used for out of band communication of public keys."

https://www.crockford.com/base32.html

## Requirements

- BCMath PHP extension - https://www.php.net/manual/en/book.bc.php
- moontoast/math - Apache-2.0 License

## Installation

`composer require tishotm/crockford-base32`

## Usage

```PHP

use TishoTM\Crockford\Base32 as Crockford;

// "14S-C0P-JV"
$encoded = Crockford::encode("1234567890", true, 3);

// 1234567890
$decoded = Crockford::decode("14S-C0P-JV", true);
```

## License

[MIT license](https://opensource.org/licenses/MIT).

## Credits

https://github.com/dflydev/dflydev-base32-crockford
https://github.com/jbittel/base32-crockford