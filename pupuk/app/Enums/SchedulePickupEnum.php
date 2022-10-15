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
    const __default = self::MINGGU;

    const SENIN = 'Senin';
    const SELASA = 'Selasa';
    const RABU = 'Rabu';
    const KAMIS = 'Kamis';
    const JUMAT = 'Jumat';
    const SABTU = 'Sabtu';
    const MINGGU = 'Minggu';
}
