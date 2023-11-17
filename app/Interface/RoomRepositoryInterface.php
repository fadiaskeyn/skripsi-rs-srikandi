<?php

namespace App\Interface;

use App\Models\Room;

interface RoomRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Room;

}
