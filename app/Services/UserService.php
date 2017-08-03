<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function createUser(array $data)
    {
        $userData = [
            'role_id' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];

        return User::create($userData);
    }

    public function updateUser(array $data, $id)
    {
        $user = User::findOrFail($id);
        $userData = [
            'role_id' => $data['role'],
            'name' => $data['name']
        ];

        return $user->update($userData);
    }
}