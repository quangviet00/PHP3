<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps = false;
    protected $fillable = [
       'user_id',
        'tieu de',
         'noi dung',   
          'trang thai',
          'anh'
    ];
    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
