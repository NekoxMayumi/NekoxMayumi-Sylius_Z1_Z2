<?php
declare(strict_types=1);
namespace App\Assigner;

use App\Provider\ShipmentCodeProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Core\Model\ShipmentInterface;

final class ShipmentCodeAssigner implements ShipmentCodeAssignerInterface
{
    /**
     * @var ShipmentCodeProviderInterface
     */
    private ShipmentCodeProviderInterface $shipmentCodeProvider;

    /**
     * @var ObjectManager
     */
    private ObjectManager $shipmentManager;

    /**
     * @param ShipmentCodeProviderInterface $shipmentCodeProvider
     * @param ObjectManager $shipmentManager
     */
    public function __construct(ShipmentCodeProviderInterface $shipmentCodeProvider, ObjectManager $shipmentManager)
    {
        $this->shipmentCodeProvider = $shipmentCodeProvider;
        $this->shipmentManager = $shipmentManager;
    }

    public function assign(ShipmentInterface $shipment): void
    {
       if ($shipment->getState() !== ShipmentInterface::STATE_SHIPPED) {
           return;
       }
       $shipment->setTracking($this->shipmentCodeProvider->provide($shipment));
       $this->shipmentManager->flush();
    }
}
