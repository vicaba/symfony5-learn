<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\ValueObject;

class FilmId
{
    public function __construct(private string $id,)
    {}

    public function value(): string {
        return $this->id;
    }
}