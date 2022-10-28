<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CatchErrors
{
    public static function rollback($e, $message = 'Something went wrong! Process not completed')
    {
        DB::rollBack();
        self::throw($e, $message);
    }

    public static function throw($e, $message = 'Something went wrong! Process not completed')
    {
        Log::info($e);
        return redirect()->back()->with(['error' => $message]);
    }
}
