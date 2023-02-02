<?php

namespace App\Entity\Product\ProductColor;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductColorInterface extends ResourceInterface
{
    public function getId(): int;
    public function getName(): string;
    public function setName(string $name): void;
    public function getProducts(): Collection;
    public function getState(): string;
    public function setState(string $state): void;

}
