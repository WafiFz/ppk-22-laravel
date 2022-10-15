<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static SchedulePickupEnum FOO()
 * @method static SchedulePickupEnum BAR()
 * @method static SchedulePickupEnum BAZ()
 */
final class SchedulePickupEnum extends Enum
{
    const __default = self::FOO;

    const FOO = 0;
    const BAR = 1;
    const BAZ = 2;
}
