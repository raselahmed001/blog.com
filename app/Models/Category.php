<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    static public function getRecord()
    {
        return self::select('categories.*')
                   ->where('is_delete', '=', 0)
                   ->orderBy('id', 'desc')
                   ->paginate(30);
    }
    static public function getSingle($id){
        return self::find($id);
    }

    static public function getCategory()
    {
        return self::select('categories.*')
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->get();
    }
    public function totalBlog()
    {
        return $this->hasMany(Blog::class, 'category_id')
                ->where('blogs.status', '=', 1)
                ->where('blogs.is_publish', '=', 1)
                ->where('blogs.is_delete', '=', 0)
                ->count();
    }
    public static function getCategoryMenu()
    {
        return self::select('categories.*')
        ->where('status', '=', 1)
        ->where('is_menu', '=', 1)
        ->where('is_delete', '=', 0)
        ->get();
    }
    public static function getBySlug($slug)
    {
        return self::select('categories.*')
        ->where('slug', '=', $slug)
        ->where('is_delete', '=', 0) 
        ->first();
    }
    

}
