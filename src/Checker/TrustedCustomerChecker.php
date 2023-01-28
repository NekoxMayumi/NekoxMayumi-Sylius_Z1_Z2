<?php

declare(strict_types=1);

namespace App\Checker;

use Sylius\Component\Core\Model\CustomerInterface;

final class TrustedCustomerChecker implements TrustedCustomerCheckerInterface
{
    public function check(CustomerInterface $customer): bool
    {
        $group = $customer->getGroup();
       if ($group === null){
           return false;
       }

       if ($group->getCode() !== 'TRUSTED'){
           return false;
       }
       return true;
    }
}
