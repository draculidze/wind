<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store()
    {
        $dataUser = [
            'name' => 'Dimon',
            'email' => 'draculidze@mail.ru',
            'password' => md5("12345"),
            'email_verified_at' => '2024-12-22',
        ];
        return User::create($dataUser);
    }

    public function update(User $user)
    {
        if($user){
            $dataUser = [
                'name' => 'Dmitry',
                'email' => 'kurennovd@mail.ru',
                'password' => md5("12345"),
                'email_verified_at' => '2024-12-23',
            ];
            $user->update($dataUser);
            return $user;
        }
        return false;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response(['message' => 'deleted'], 200);
    }
}
