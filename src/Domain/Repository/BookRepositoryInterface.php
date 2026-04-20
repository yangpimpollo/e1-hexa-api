<?php

namespace yangpimpollo\Domain\Repository;

use yangpimpollo\Domain\Entity\Book;

interface BookRepositoryInterface
{
    /** @return Book[] */
    public function findAll(): array;
    public function findById(int $id): ?Book;
    public function save(Book $book): Book;
    public function update(Book $book): Book;
    public function delete(int $id): bool;
}
