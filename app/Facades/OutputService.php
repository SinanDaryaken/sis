<?php

namespace App\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * class OutputService
 * @package App\Facades
 * @method static self init(mixed $data = [], string $message = 'OK', int $code = 200)
 * @method static JsonResponse response()
 * @see \App\Services\OutputService
 */
class OutputService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'output_service';
    }
}
