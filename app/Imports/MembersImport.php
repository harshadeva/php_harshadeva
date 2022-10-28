<?php

namespace App\Imports;

use App\Repositories\Member\MemberInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class MembersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'user_id' => Auth::user()->id,
                'first_name' => $row[0],
                'last_name' => $row[1],
                'email' => $row[2],
                'phone' => $row[3],
                'comment' => $row[4],
            ];

            $memberInterface = App::make(MemberInterface::class);
            $memberInterface->store($data);
        }
    }
}
