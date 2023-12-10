<?php

namespace App\Enums;

enum PatientWayout: string
{
    case DOCTOR = 'Atas Izin Dokter';
    case SELF = 'Pulang Paksa';
    case REFERRED = 'Dirujuk';
    case DIED = 'Meninggal';
}
