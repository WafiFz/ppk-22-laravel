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
    const __default = self::BARU;

    const BARU = 'Penjemputan baru';
    const PROSES = 'Proses';
    const SELESAI = 'Selesai';
    const TERKENDALA = 'Terkendala';
    const BATAL = 'Batal';
}
