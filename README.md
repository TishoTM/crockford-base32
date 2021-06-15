# Crockford Base32

<p align="left">
<a href="https://travis-ci.com/github/TishoTM/crockford-base32"><img src="https://api.travis-ci.com/TishoTM/crockford-base32.svg?branch=master" alt="Build Status" /></a>
<a href="https://packagist.org/packages/tishotm/crockford-base32"><img class="badge" src="https://poser.pugx.org/tishotm/crockford-base32/version" alt="Version" /></a>
<a href="https://packagist.org/packages/tishotm/crockford-base32"><img class="badge" src="https://poser.pugx.org/tishotm/crockford-base32/downloads" alt="Total Downloads" /></a>
<a href="https://packagist.org/packages/tishotm/crockford-base32"><img class="badge" src="https://poser.pugx.org/tishotm/crockford-base32/license" alt="License" /></a>
</p>

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

- https://github.com/dflydev/dflydev-base32-crockford
- https://github.com/jbittel/base32-crockford