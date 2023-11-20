<?php

namespace App\Repositories;
use App\Interface\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function getData(): array{
        $user = User::select('id', 'name', 'username', 'email')->get();
        return $user->toArray();
    }

    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'position' => $data['position'],
            'employee_number' => $data['employee_number'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }
    public function destroy(User $user): bool
    {
        return $user->delete();
    }
}
