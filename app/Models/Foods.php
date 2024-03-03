<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    //class name and table name may be different
    protected $table ='foods';//tên bảng
    protected $primaryKey = 'id';//khoá chính 
    //if you donot want to use created_at / updated_at?
    public $timestamps = true;//false sẽ không hiện ra created_at / updated_at
    // protected $dateFormat = 'h:m:s';//định dạng ngày

    protected $fillable = ['name','count','descriptions','image_path','category_id'];

    //a food belongs to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
