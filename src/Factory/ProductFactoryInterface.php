<?php
declare(strict_types=1);
namespace App\Factory;

use Sylius\Component\Product\Factory\ProductFactoryInterface as BaseProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

interface ProductFactoryInterface extends BaseProductFactoryInterface
{
    /**
     * @return ProductInterface
     */
    public function createTshirt(): ProductInterface;

}
