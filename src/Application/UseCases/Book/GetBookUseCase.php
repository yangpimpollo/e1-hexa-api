<?php

namespace yangpimpollo\Application\UseCases\Book;

use yangpimpollo\Domain\Entity\Book;
use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class GetBookUseCase
{
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function execute(int $id): ?Book
    {
        return $this->repository->findById($id);
    }
}
