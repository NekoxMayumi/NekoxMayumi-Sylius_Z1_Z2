<?php

declare(strict_types=1);

namespace App\Entity\Product;

use App\Entity\Supplier\SupplierInterface;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct
{
    /**
     * @var SupplierInterface
     * @ORM\ManyToOne(targetEntity="App\Entity\Supplier\Supplier", inversedBy="products")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     */
    private SupplierInterface $supplier;

    /**
     * @return SupplierInterface
     */
    public function getSupplier(): SupplierInterface
    {
        return $this->supplier;
    }

    public function setSupplier(SupplierInterface $supplier): void
    {
        $this->supplier = $supplier;
    }

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }
}
