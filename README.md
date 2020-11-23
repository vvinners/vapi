# VAPI - Standardize the format of API return

## Table of Contents
- [Contribution](#contribution)
- [Installation](#installation)
- [Demo](#demo)


## Contribution
Contributions are what make such an amazing community and project. Learn, inspire, and create between each other. Any contributions you make are **greatly appreciated**.

## Installation
```bash
composer require vvinners/vapi
```

Publish config file to app/config

```bash
php artisan vendor:publish --provider="VVinners\Vapi\VapiServiceProvider" --tag=config
```
<br />
Put this to config/app.php if the package is not auto discovered
```php
VVinners\Vapi\VapiServiceProvider::class,
```

## Demo
```php
use VVinners\Vapi\Api;

$api = new Api;
return $api->response($data, $code);
```
