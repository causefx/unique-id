## unique-id

[![Latest Stable Version](https://poser.pugx.org/sak32009/unique-id/v/stable)](https://packagist.org/packages/sak32009/unique-id)
[![Total Downloads](https://poser.pugx.org/sak32009/unique-id/downloads)](https://packagist.org/packages/sak32009/unique-id)
[![Latest Unstable Version](https://poser.pugx.org/sak32009/unique-id/v/unstable)](https://packagist.org/packages/sak32009/unique-id)
[![License](https://poser.pugx.org/sak32009/unique-id/license)](https://packagist.org/packages/sak32009/unique-id)

## Description

Creates unique static ID.

## Requirements

* PHP >= `5.4`

## Installation

### [Composer](https://getcomposer.org/) (Recommended)

Run the command the following from within your project directory:

```
composer require sak32009/unique-id
```

```php
include "vendor/autoload.php";
```

### Direct download

If you want to install manually, on the main page you can download or clone the repo.

```php
include "src/sak32009/unique-id.php";
```

## Usage

```php
$uniqueID = new sak32009\uniqueID;
$uniqueID->setOption('hash_salt', 'my_private_key');
```

## Functions

### Generate ID

For generate ID use `$uniqueID->generateID()`:

```php
$uniqueID->generateID();
```

### Compare

For compare your id with another id use `$uniqueID->compare(anotherID)`:

```php
$uniqueID->compare('another_unique_id');
```

**Note**: Use this to check if it has a valid id.

### Set options

For set options use `$uniqueID->setOption(key, val)`:

```php
$uniqueID->setOption('hash_salt', 'my_private_key');
```

**Note**: See `options` section.

## Options

**hash_salt** Default: *null*, Type: string

See this link [WIKIPEDIA](https://en.wikipedia.org/wiki/Salt_%28cryptography%29), in short is the private key.

```php
$uniqueID->setOption('hash_salt', 'my_private_key');
```

**hash_algo** Default: *sha256*, Type: string

See [PHP-HASH-ALGOS](https://secure.php.net/manual/en/function.hash-algos.php)

```php
$uniqueID->setOption('hash_algo', 'sha256');
```

## License

This software is distributed under the [MIT](https://opensource.org/licenses/MIT) license. Please read [LICENSE](LICENSE) for information on the software availability and distribution.

## Changelog

See the [releases pages](https://github.com/Sak32009/unique-id/releases) for a history of releases and highlights for each release.

## Versioning

Maintained under the Semantic Versioning guidelines as much as possible. Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

For more information, please visit [SEMVER](http://semver.org).

## Author

* Sak32009 `<https://github.com/Sak32009>`
