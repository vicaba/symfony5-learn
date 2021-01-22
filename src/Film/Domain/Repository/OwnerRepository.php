<?php
declare(strict_types=1);


namespace LaSalle\Film\Domain\Repository;


interface OwnerRepository
{
    public function findAll(): array;

    public function findAllOrderedByName(): array;
}