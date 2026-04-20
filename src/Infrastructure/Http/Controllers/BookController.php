<?php

namespace yangpimpollo\Infrastructure\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use yangpimpollo\Application\DTOs\BookDTO;
use yangpimpollo\Application\UseCases\Book\CreateBookUseCase;
use yangpimpollo\Application\UseCases\Book\DeleteBookUseCase;
use yangpimpollo\Application\UseCases\Book\GetBookUseCase;
use yangpimpollo\Application\UseCases\Book\ListBooksUseCase;
use yangpimpollo\Application\UseCases\Book\UpdateBookUseCase;
use yangpimpollo\Domain\Entity\Book;

class BookController
{
    public function __construct(
        private readonly ListBooksUseCase $listBooksUseCase,
        private readonly CreateBookUseCase $createBookUseCase,
        private readonly GetBookUseCase $getBookUseCase,
        private readonly UpdateBookUseCase $updateBookUseCase,
        private readonly DeleteBookUseCase $deleteBookUseCase
    ) {}

    public function index(): JsonResponse
    {
        $books = $this->listBooksUseCase->execute();
        return response()->json(array_map(fn(Book $book) => $book->toArray(), $books));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string',
        ]);

        $dto = new BookDTO(
            $request->input('title'),
            $request->input('author'),
            $request->input('genre')
        );

        $book = $this->createBookUseCase->execute($dto);
        return response()->json($book->toArray(), 201);
    }

    public function show(int $id): JsonResponse
    {
        $book = $this->getBookUseCase->execute($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book->toArray());
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string',
        ]);

        $dto = new BookDTO(
            $request->input('title'),
            $request->input('author'),
            $request->input('genre')
        );

        $book = $this->updateBookUseCase->execute($id, $dto);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book->toArray());
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->deleteBookUseCase->execute($id);

        if (!$deleted) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(null, 204);
    }
}
