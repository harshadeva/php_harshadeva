<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['name'];

     /* ------ MUTATOR and ACCESSORS ------ */
     public function getNameAttribute()
     {
         return $this->first_name . ' ' . $this->last_name;
     }
     

    /* RELATIONSHIPS */

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
   
    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
