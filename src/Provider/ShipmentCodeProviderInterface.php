<?php

declare(strict_types=1);

namespace App\Provider;

use Sylius\Component\Core\Model\ShipmentInterface;

interface ShipmentCodeProviderInterface
{
    Public function provide(ShipmentInterface $shipment): string;

}
