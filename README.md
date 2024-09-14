<h1 align="center">Litensi.id Unofficial API</h1>

---

## Documentation
- [Installing](#installing)
- [Example](#example)
- [Run Tests](#run-tests)

## Installing
```sh
composer require walangkaji/litensi-api
```
### Example

Please retrieve the API ID and Key from the following link: https://litensi.id/profile/api

```php
<?php

use walangkaji\LitensiAPI\Litensi;

require __DIR__ . '/vendor/autoload.php';

$apiId  = 000;
$apiKey = 'xxxxxxxxxxxxx';

$litensi = new Litensi($apiId, $apiKey);

// Get profile
$profile = $litensi->profile();

// API Social Media
$socialMedia = $litensi->socialMedia();
$service     = $socialMedia->services();
$order       = $socialMedia->order(...);
$status      = $socialMedia->status(...);

// API SMS Activation
$sms       = $litensi->sms();
$countries = $sms->countries();
$services  = $sms->services();
$operators = $sms->operators();
$prices    = $sms->prices();
$order     = $sms->order(...);
$getStatus = $sms->getStatus(...);
$setStatus = $sms->setStatus(...);

// API Email Activation
$mail      = $litensi->mail();
$prices    = $mail->prices(...);
$order     = $mail->order(...);
$getStatus = $mail->getStatus(...);
$setStatus = $mail->setStatus(...);
$reOrder   = $mail->reOrder(...);
```

## Run Tests

With Windows Terminal :

```sh
# run phpunit
php vendor/bin/phpunit

# run psalm static analysis tool
php vendor/bin/psalm

# run phpstan static analysis tool
php vendor/bin/phpstan

# run php-cs-fixer for fix
php vendor/bin/php-cs-fixer fix --diff

# run php-cs-fixer for check without writing changes
php vendor/bin/php-cs-fixer fix --diff --dry-run
```

With Unix (bash / git bash):

Windows Terminal : install [Chocolatey](https://chocolatey.org/install#individual) and install [GNU Make](https://community.chocolatey.org/packages/make):

```sh
# run phpunit
make test

# run psalm static analysis tool
make psalm

# run phpstan static analysis tool
make phpstan

# run php-cs-fixer for fix
make fixer-fix

# run php-cs-fixer for check without writing
make fixer-check
```
