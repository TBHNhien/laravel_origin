<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //hàm để diễn tả quan hệ 1 nhiều với bảng Foods
    //hàm chứa 1 array để trả về foods
    public function foods()
    {
        return $this->hasMany(Foods::class); //thể hiện quan hệ 1 nhiều
    }
}
