<?php

namespace yangpimpollo\Application\UseCases;

class HelloWorld
{
    public function execute(): string
    {
        return "Hello World from Hexagonal Architecture!";
    }
}