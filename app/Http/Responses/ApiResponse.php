<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class ApiResponse implements Responsable
{

    protected int $httpCode;
    protected mixed $data;
    protected array $messages;
    protected string $errorMessage;

    public function __construct(
        int $httpCode,
        mixed $data = [],
        array $messages = [],
        string $errorMessage = ''
    ) {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->messages = $messages;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request): JsonResponse
    {

        $payload = match (true) {
            $this->httpCode >= 500 => [
                'error_message' => 'Server error'
            ], //if you don't show server errors to all

            $this->httpCode >= 400 => [
                // 'error_message' => $this->errorMessage,
                'success' => false,
                'messages' => $this->messages,
                'data' => null
            ],

            $this->httpCode >= 200 => [
                'success' => true,
                'messages' => $this->messages,
                'data' => $this->data
            ],
        };

        return response()->json(
            data: $payload,
            status: $this->httpCode,
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(mixed $data, array $messages = []): ApiResponse
    {
        return new static(200, $data, $messages);
    }

    public static function error(array $messages = [], int $httpCode = 400): ApiResponse
    {
        return new static($httpCode, messages: $messages);
    }
}
