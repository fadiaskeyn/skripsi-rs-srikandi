<?php

namespace App\Interface;

use App\Models\Diagnosis;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

interface DiagnosisRepositoryInterface
{
    public function getData(): Collection;
    public function save(Request $request);
    public function destroy(int $diagnosis): JsonResponse;
}
