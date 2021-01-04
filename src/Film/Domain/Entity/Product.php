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

    /**
     * @ORM\ManyToOne(targetEntity="Owner", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    private Owner $owner;

    public function __construct(string $name, float $price, string $description, Owner $owner)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
    }

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

    public function owner(): Owner
    {
        return $this->owner;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    public function setOwner(Owner $owner): Product
    {
        $this->owner = $owner;
        return $this;
    }
}