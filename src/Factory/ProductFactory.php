<?php
declare(strict_types=1);
namespace App\Factory;

use DateTime;
use Sylius\Component\Product\Factory\ProductFactoryInterface as BaseProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ProductFactory implements ProductFactoryInterface
{
    /**
     * @var BaseProductFactoryInterface
     */
    private BaseProductFactoryInterface $baseFactory;

    public function __construct(BaseProductFactoryInterface $baseFactory)
    {
        $this->baseFactory = $baseFactory;
    }


    public function createNew()
    {
        return $this->baseFactory->createNew();
    }

    public function createTshirt(): ProductInterface
    {
       $product = $this->createWithVariant();
       $product->setCode('T_SHIRT_*'.(new DateTime())->format('d_m_y_H_i_s'));
       $product->getName('T_Shirt *');

       return $product;
    }

    public function createWithVariant(): ProductInterface
    {
      return $this->createWithVariant();
    }
}
