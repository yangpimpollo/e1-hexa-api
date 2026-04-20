<?php

namespace yangpimpollo\Application\UseCases\Book;

use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class DeleteBookUseCase
{
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
