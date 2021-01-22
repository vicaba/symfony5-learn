<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;
use LaSalle\Film\Domain\Repository\OwnerRepository;

class MysqlDoctrineOwnerRepository implements OwnerRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {}

    // If we want to still be able to call other methods from the "native" doctrine EntityRepository
    public function findAll(): array
    {
        return $this->classRepository()
            ->findAll();
    }

    public function findAllOrderedByName(): array
    {
        return $this
            ->entityManager
            ->createQuery("SELECT o FROM \LaSalle\Film\Domain\Entity\Owner o ORDER BY o.name ASC")
            ->getResult();
    }

    private function classRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository("\LaSalle\Film\Domain\Entity\Owner");
    }
}