<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static PupupStatusEnum FOO()
 * @method static PupupStatusEnum BAR()
 * @method static PupupStatusEnum BAZ()
 */
final class PupupStatusEnum extends Enum
{
    const __default = self::BARU;

    const BARU = 'PESANAN_BARU';
    const PROSES = 'PROSES';
    const SELESAI = 'SELESAI';
    const TERKENDALA = 'TERKENDALA';
    const BATAL = 'BATAL';
}