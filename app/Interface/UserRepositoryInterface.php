<?php


namespace App\Interface;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
}