<?php
declare(strict_types=1);

namespace LaSalle\Film\Application\Request;

class GetFilmByIdRequest
{
    public function __construct(private string $id)
    {}

    public function filmId(): string
    {
        return $this->id;
    }
}