# FinTS HBCI PHP

[![Build Status](https://img.shields.io/travis/mschindler83/fints-hbci-php/master.svg)](https://travis-ci.org/mschindler83/fints-hbci-php)
[![Latest Stable Version](https://img.shields.io/packagist/v/mschindler83/fints-hbci-php.svg)](https://packagist.org/packages/mschindler83/fints-hbci-php)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/mschindler83/fints-hbci-php.svg)](https://scrutinizer-ci.com/g/mschindler83/fints-hbci-php/?branch=master)
[![Monthly Downloads](https://img.shields.io/packagist/dm/mschindler83/fints-hbci-php.svg)](https://packagist.org/packages/mschindler83/fints-hbci-php)
[![License](https://img.shields.io/github/license/mschindler83/fints-hbci-php.svg)](https://github.com/mschindler83/fints-hbci-php/blob/master/LICENSE)

Forked from mschindler83/fints-hbci-php

A PHP library implementing the basics of the FinTS / HBCI protocol.
It can be used to fetch the balance of connected bank accounts and for fetching bank statements of accounts.

Added functionality for sending transfers.

## Getting Started

Install via composer:

```bash
composer require janfoerste/php-fints
```

## How to use it

You can have a look at the "Samples" folder in this repository.
Just fill in the required data beginning from line 13 to 17 and run the script.

You can find the server information of your bank here:
https://www.hbci-zka.de/institute/institut_auswahl.htm

## Contribute

### Bank compatibility

This library can only work stable with *YOUR* help!
As I'm very limited in testing different banks it would be good to get some feedback from you all.
Feel free to create PR's for the [COMPATIBILITY.md](COMPATIBILITY.md) file where you can update the list of working banks.

### Code Style

If you plan to contribute to this library, please ensure that you stick with the PSR coding rules as close as you can (At least PSR-0 to PSR-4).
You can find the PHP Standard Recommendations [here](http://www.php-fig.org/psr/)

### Have fun!

Looking for a direct wire transfer online payment solution?

Checkout https://www.konto-secure.de
