<?php

namespace yangpimpollo\Application\DTOs;

class BookDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $author,
        public readonly string $genre
    ) {}
}
