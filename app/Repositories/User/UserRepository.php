<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserInterface
{

    public function getById(int $id): object
    {
        return User::find($id);
    }
   
    public function getByEmail(string $email): ?object
    {
        return User::whereEmail($email)->first();
    }

}
