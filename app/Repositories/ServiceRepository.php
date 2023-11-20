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
    public function update(Service $service, array $data): Service
    {
        $service->update([
            'name' => $data['name']
        ]);
        
        return $service;
    }
    public function destroy(Service $service): bool 
    {
         return $service->delete();
    }
}
