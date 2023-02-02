<?php

declare(strict_types=1);

namespace App\DateTime;

use DateTime;

final class Clock implements ClockInterface
{
    public function isNight(): bool
    {
//        $currentHour = (int) (new DateTime())->format('H');
//
//        return $currentHour > 3 || $currentHour < 6;

        return false;
    }
}
