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
    const __default = self::CAMPURAN;

    const ORGANIK = 'Organik';
    const ANORGANIK = 'Anorganik';
    const CAMPURAN = 'Campuran';
}
