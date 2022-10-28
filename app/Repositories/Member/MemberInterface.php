<?php

namespace App\Repositories\Member;

interface MemberInterface
{
    public function getById(int $id) : object;
    public function getPaginated() : object;
    public function store(array $data) : object;
    public function destroy(int $id) : void;
    public function update(int $id,array $data) : void;
}
