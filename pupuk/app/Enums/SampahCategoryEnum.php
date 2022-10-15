<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static SampahCategoryEnum FOO()
 * @method static SampahCategoryEnum BAR()
 * @method static SampahCategoryEnum BAZ()
 */
final class SampahCategoryEnum extends Enum
{
    const __default = self::FOO;

    const FOO = 0;
    const BAR = 1;
    const BAZ = 2;
}
