<?php

namespace yangpimpollo\Infrastructure\Persistence;

use App\Models\Book as EloquentBook;
use yangpimpollo\Domain\Entity\Book;
use yangpimpollo\Domain\Repository\BookRepositoryInterface;

class EloquentBookRepository implements BookRepositoryInterface
{
    public function findAll(): array
    {
        return EloquentBook::all()->map(fn(EloquentBook $book) => $this->toEntity($book))->toArray();
    }

    public function findById(int $id): ?Book
    {
        $book = EloquentBook::find($id);
        return $book ? $this->toEntity($book) : null;
    }

    public function save(Book $book): Book
    {
        $eloquentBook = new EloquentBook();
        $eloquentBook->title = $book->getTitle();
        $eloquentBook->author = $book->getAuthor();
        $eloquentBook->genre = $book->getGenre();
        $eloquentBook->save();

        return $this->toEntity($eloquentBook);
    }

    public function update(Book $book): Book
    {
        $eloquentBook = EloquentBook::findOrFail($book->getId());
        $eloquentBook->title = $book->getTitle();
        $eloquentBook->author = $book->getAuthor();
        $eloquentBook->genre = $book->getGenre();
        $eloquentBook->save();

        return $this->toEntity($eloquentBook);
    }

    public function delete(int $id): bool
    {
        $book = EloquentBook::find($id);
        if (!$book) {
            return false;
        }
        return $book->delete();
    }

    private function toEntity(EloquentBook $book): Book
    {
        return new Book(
            $book->id,
            $book->title,
            $book->author,
            $book->genre
        );
    }
}
