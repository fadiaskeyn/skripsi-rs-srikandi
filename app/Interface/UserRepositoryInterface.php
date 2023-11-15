<?php


namespace App\Interface;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): User;

}