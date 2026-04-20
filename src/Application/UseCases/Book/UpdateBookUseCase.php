<?php

namespace yangpimpollo\Application\UseCases\Book;

use yangpimpollo\Application\DTOs\BookDTO;
use yangpimpollo\Domain\Entity\Book;
use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class UpdateBookUseCase
{
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function execute(int $id, BookDTO $dto): ?Book
    {
        $book = $this->repository->findById($id);

        if (!$book) {
            return null;
        }

        $book->setTitle($dto->title);
        $book->setAuthor($dto->author);
        $book->setGenre($dto->genre);

        return $this->repository->update($book);
    }
}
