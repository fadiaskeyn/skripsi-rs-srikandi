<?php

namespace App\Repositories;

use App\Interface\RoomRepositoryInterface;
use App\Models\Room;

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

    public function update(Room $room, array $data): Room
    {
        $room->update([
            'name' => $data['name'],
            'number_of_beds' => $data['number_of_beds'],
            'type_room' => $data['type_room']
        ]);
        
        return $room;
    }

    public function destroy(Room $room): bool
    {
        return $room->delete();
    }
}
