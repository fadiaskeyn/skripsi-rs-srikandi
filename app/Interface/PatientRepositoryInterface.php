<?php

namespace App\Interface;

use App\Models\Patient;

interface PatientRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Patient;
}
