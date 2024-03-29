# VAPI - Standardize the format of API return

###[IMPORTANT] V2 of VAPI has breaking changes, should remove msgcode.php from config folder and publish the config file

## Table of Contents
- [Contribution](#contribution)
- [Installation](#installation)
- [Demo](#demo)
- [V2] (#v2)
- [License](#license)


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
VVinners\Vapi\VapiServiceProvider::class
```

## Demo


```php
use VVinners\Vapi\Api;

$api = new Api;
return $api->response(["result" => true], "OK");
```

The code above will convert the data to this <b>JSON format</b> and return in <b>HTTP 200 status</b> 

```javascript
{msg_code: "OK", msg: "Success", result: true}
```

the second parameter <b>"OK"</b> can be updated at the msgcode.php 
below is an example data of the file

```php
<?php

return [

    'response_status' => [
        // HTTP_INTERNAL_SERVER_ERROR
        '500' => [
            'ERROR' => 'Error encountered'
        ],
    
        // HTTP_OK
        '200' => [
            'OK' => 'Success',
            'USER_NOT_FOUND' => 'User not found',
        ],
    
        // HTTP_BAD_REQUEST
        '400' => [
            'INVALID_DATA_INPUT' => 'Invalid data pass to server',
            'VALIDATION_ERROR' => 'Validation error',
        ],
    
        // HTTP_UNAUTHORIZED
        '401' => [
    
        ],
    
        // HTTP_FORBIDDEN
        '403' => [
    
        ]
    ],
    'msg_code_name' => 'msg_code',
    'msg_name' => 'msg',

];

```

## V2

- able to customize the msg_code and msg column at return response
- update msgcode.php format

## License
The MIT License (MIT)

Copyright (c) 2020 VVinners

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
