<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static SampahStatusEnum FOO()
 * @method static SampahStatusEnum BAR()
 * @method static SampahStatusEnum BAZ()
 */
final class SampahStatusEnum extends Enum
{
    const __default = self::FOO;

    const FOO = 0;
    const BAR = 1;
    const BAZ = 2;
}
