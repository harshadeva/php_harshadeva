<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

     /* RELATIONSHIPS */

     public function members()
     {
         return $this->hasMany(Member::class, 'route_id');
     }
}
