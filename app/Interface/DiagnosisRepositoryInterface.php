<?php

namespace App\Interface;

use App\Models\Diagnosis;
use Illuminate\Support\Collection;

interface DiagnosisRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Diagnosis;
    public function update(Diagnosis $diagnosis, array $data): Diagnosis;
    public function destroy(Diagnosis $diagnosis): bool;
}
