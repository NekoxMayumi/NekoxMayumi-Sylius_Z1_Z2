<?php

declare(strict_types=1);

namespace App\Entity\Product\ProductColor;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_color")
 */
class ProductColor implements ProductColorInterface
{
    public const STATE_NEW = "new";

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected int $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected string $name;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Product\Product", mappedBy="color")
     */
    protected Collection $products;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $state = self::STATE_NEW;

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }
    public function getState(): string
    {
        return $this->state;
    }
    public function setState(string $state): void
    {
        $this->state = $state;
    }



}
