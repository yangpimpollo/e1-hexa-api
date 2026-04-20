<?php

namespace yangpimpollo\Application\UseCases\Book;

use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class ListBooksUseCase
{
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}
