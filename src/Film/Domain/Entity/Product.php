<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

// THIS CLASS IS ONLY AN EXAMPLE

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $name;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private float $price;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;


    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }
}