<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class OutputService
{
    /**
     * @var mixed|array
     */
    protected mixed $data = [];
    /**
     * @var string
     */
    protected string $message = 'OK';
    /**
     * @var int
     */
    protected int $code = 200;

    /**
     * @param mixed $data
     * @param string $message
     * @param int $code
     * @return $this
     */
    public function init(mixed $data = [], string $message = 'OK', int $code = 200): self
    {
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
        return $this;
    }

    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        $response = [
            'status' => $this->code == 200 ? 'success' : 'error',
            'message' => $this->message,
            'data' => $this->data,
        ];

        return response()->json($response, $this->code)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
