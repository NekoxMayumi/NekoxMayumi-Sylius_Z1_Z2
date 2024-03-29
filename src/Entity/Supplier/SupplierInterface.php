<?php

namespace App\Entity\Supplier;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_supplier")
 */
interface SupplierInterface extends ResourceInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): string;

    public function setEmail(string $email): void;

    public function getState(): string;

    public function setState(string $state): void;

    public function getProducts(): Collection;

    public function countProducts(): int;
}
