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

    const BARU = 'PENJEMPUTAN_BARU';
    const PROSES = 'PROSES';
    const SELESAI = 'SELESAI';
    const TERKENDALA = 'TERKENDALA';
    const BATAL = 'BATAL';
}