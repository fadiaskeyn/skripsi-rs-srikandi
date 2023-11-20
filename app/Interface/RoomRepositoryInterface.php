<?php

namespace App\Interface;

use App\Models\Room;

interface RoomRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Room;
    public function update(Room $room, array $data): Room;
    public function destroy(Room $room): bool;

    
}
