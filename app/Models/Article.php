<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title','content','user_id','category_id','image'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function category()
    {
       return  $this->belongsTo(Category::class);
    }
    public function getImageAttribute($v)
        //修改器定义image的文件路径 ,
        //数据库有_的字段更改为驼峰命名
        //config文件夹中(filesystems.php).disks.custom.url
    {
        if ($v){
            return config('filesystems.disks.admin.url').'/'.$v;
        }
        else
            return "";
    }
}
