<?php

namespace App\Interface;

use App\Models\Service;
use Illuminate\Support\Collection;

interface ServiceRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Service;
    public function update(Service $service, array $data): Service;
    public function destroy(Service $service): bool;
}
