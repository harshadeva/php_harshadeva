<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function getById(int $id) : object;
    public function getByEmail(string $email) : ?object;
}
