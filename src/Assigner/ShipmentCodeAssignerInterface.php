<?php

declare(strict_types=1);

namespace App\Assigner;

use Sylius\Component\Core\Model\ShipmentInterface;

interface ShipmentCodeAssignerInterface
{
    public function assign(ShipmentInterface $shipment): void;



}
