<?php

namespace yangpimpollo\Application\UseCases\Book;

use yangpimpollo\Application\DTOs\BookDTO;
use yangpimpollo\Domain\Entity\Book;
use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class CreateBookUseCase
{
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function execute(BookDTO $dto): Book
    {
        $book = new Book(
            null,
            $dto->title,
            $dto->author,
            $dto->genre
        );

        return $this->repository->save($book);
    }
}
