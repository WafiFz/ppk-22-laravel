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

    const BARU = 'Pesanan baru';
    const PROSES = 'Proses';
    const SELESAI = 'Selesai';
    const TERKENDALA = 'Terkendala';
    const BATAL = 'Batal';
}
