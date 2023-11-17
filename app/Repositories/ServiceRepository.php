<?php

namespace App\Repositories;

use App\Interface\ServiceRepositoryInterface;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getData(): array
    {
        return Service::select('id', 'name')->get()->toArray();
    }

    public function create(array $data): Service
    {
        return Service::create([
            'name' => $data['name']
        ]);
    }
}
