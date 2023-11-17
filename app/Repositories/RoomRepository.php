<?php

namespace App\Repositories;

use App\Interface\RoomRepositoryInterface;
use App\Models\Room;
use Illuminate\Support\Collection;

class RoomRepository implements RoomRepositoryInterface
{
    public function getData(): array
    {
        return Room::select('id','name', 'number_of_beds', 'type_room')->get()->toArray();
    }

    public function create(array $data): Room
    {
        return Room::create([
            'name' => $data['name'],
            'number_of_beds' => $data['number_of_beds'],
            'type_room' => $data['type_room']
        ]);
    }
}
