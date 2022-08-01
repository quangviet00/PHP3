<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $fillable =
    [
        'name',
     'status'
      ];
    public function users(){
        return $this->hasMany(User::class,'room_id','id');
    }
}
