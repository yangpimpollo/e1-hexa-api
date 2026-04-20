<?php

namespace yangpimpollo\Infrastructure\Http\Controllers;

use Illuminate\Http\JsonResponse;
use yangpimpollo\Application\UseCases\HelloWorld;

class HelloWorldController
{
    public function __construct(
        private readonly HelloWorld $useCase
    ) {}

    public function __invoke(): JsonResponse
    {
        $message = $this->useCase->execute();

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'message' => $message
            ]
        ]);
    }
}