### About
simple package to help you in handling json responses

## Requirements

- PHP `^8.2`


## Installation
```bash
composer require mrizki28/handler-api-response
```

## Example

```php
<?php

namespace App\Http\Controller;

use App\Http\Controllers\Controller;
use MRizki28\ApiResponse\ApiResponse;
use App\Models\User;

class ExampleController extends Controller
{
    public function getAllUser()
    {
        $data = User::all();
        return ApiResponse::success($data, 'success get all user', 200);
    }
}
```

## Available methods
#### `ApiResponse.success($data , $message, $code)`
$data `array`
$message `string`
$code `int` default return `200`
#### `ApiResponse.notFound($message, $code)`
$message `string`
$code `int` default return `404`
#### `ApiResponse.error($th, $message, $code)`
$message `string`
$th `\Throwable`
$code `int` default return `500`

## Contribution

Any ideas are welcome. Feel free to submit any issues or pull requests.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
