<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

// THIS CLASS IS ONLY AN EXAMPLE

/**
 * @ORM\Entity
 * @ORM\Table(name="owner")
 */
class Owner
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

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}