<?php

namespace App\Interface;

use App\Models\PatientEntry;

interface PatientEntryRepositoryInterface
{
    public function getData(): array;

    public function create(array $data): PatientEntry;
}
