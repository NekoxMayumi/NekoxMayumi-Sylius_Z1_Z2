<?php

namespace App\Notifier;

use App\Entity\Supplier\SupplierInterface;

interface SupplierTrustingNotifierInterface
{
    public function notify(SupplierInterface $supplier): void;

}
