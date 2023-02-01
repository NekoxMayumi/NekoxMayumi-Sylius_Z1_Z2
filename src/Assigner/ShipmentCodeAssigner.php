<?php
declare(strict_types=1);
namespace App\Assigner;

use App\Provider\ShipmentCodeProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Sylius\Component\Core\Model\ShipmentInterface;

final class ShipmentCodeAssigner implements ShipmentCodeAssignerInterface
{
    /**
     * @var ShipmentCodeProviderInterface
     */
    private ShipmentCodeProviderInterface $shipmentCodeProvider;

    /**
     * @var EntityManager
     */
    private EntityManager $shipmentManager;

    /**
     * @param ShipmentCodeProviderInterface $shipmentCodeProvider
     * @param EntityManager $shipmentManager
     */
    public function __construct(ShipmentCodeProviderInterface $shipmentCodeProvider, EntityManager $shipmentManager)
    {
        $this->shipmentCodeProvider = $shipmentCodeProvider;
        $this->shipmentManager = $shipmentManager;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function assign(ShipmentInterface $shipment): void
    {
       if ($shipment->getState() !== ShipmentInterface::STATE_SHIPPED) {
           return;
       }
       $shipment->setTracking($this->shipmentCodeProvider->provide($shipment));
       $this->shipmentManager->flush();
    }
}
