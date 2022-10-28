<?php

namespace App\Repositories\Member;

use App\Models\Member;

class MemberRepository implements MemberInterface
{

    public function getPaginated(): object
    {
        return Member::paginate();
    }
   
    public function getById(int $id): object
    {
        return Member::find($id);
    }
  
    public function destroy(int $id): void
    {
        Member::find($id)->delete();
    }
   
    public function store(array $data): object
    {
        return Member::create($data);
    }
   
    public function update(int $id,array $data): void
    {
        Member::where('id',$id)->update($data);
    }
   
}
