<?php

namespace yangpimpollo\Domain\Entity;

class Book
{
    public function __construct(
        private ?int $id,
        private string $title,
        private string $author,
        private string $genre
    ) {}

    public function getId(): ?int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getAuthor(): string { return $this->author; }
    public function getGenre(): string { return $this->genre; }

    public function setTitle(string $title): void { $this->title = $title; }
    public function setAuthor(string $author): void{ $this->author = $author; }
    public function setGenre(string $genre): void { $this->genre = $genre; }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'genre' => $this->genre,
        ];
    }
}
