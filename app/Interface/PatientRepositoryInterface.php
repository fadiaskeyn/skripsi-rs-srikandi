<?php

namespace App\Interface;

use App\Models\Patient;
use Illuminate\Support\Collection;

interface PatientRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Patient;
}
