<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

protected $table = 'blogs';


static public function getRecordFront()
{
    $return = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->join('users', 'users.id', '=', 'blogs.user_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id');

            if(!empty(Request::get('q')))
            {
                $return  = $return->where('blogs.title', '=', 'like', '%'.Request::get('q').'%');
            }

    $return=$return->where('blogs.status', '=', 1)
            ->where('blogs.is_publish', '=', 1)
            ->where('blogs.is_delete', '=', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);

    return $return;
}
// public static function getRecordFront()
// {
//     $query = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
//             ->join('users', 'users.id', '=', 'blogs.user_id')
//             ->join('categories', 'categories.id', '=', 'blogs.category_id');

//     if (!empty(request()->input('q'))) {
//         $query = $query->where('blogs.title', 'like', '%' . request()->input('q') . '%');
//     }

//     $query = $query->where('blogs.status', 1)
//             ->where('blogs.is_publish', 1)
//             ->where('blogs.is_delete', 0)
//             ->orderBy('blogs.id', 'desc')
//             ->paginate(20);

//     return $query;
// }
public static function getRecordFrontCategory($category_id)
{
    $query = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->join('users', 'users.id', '=', 'blogs.user_id')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('blogs.category_id', $category_id)
            ->where('blogs.status', 1)
            ->where('blogs.is_publish', 1)
            ->where('blogs.is_delete', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);

    return $query;
}

static public function getRecentPost()
{
    return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
                ->join('users', 'users.id', '=', 'blogs.user_id')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->where('blogs.status', '=', 1)
                ->where('blogs.is_publish', '=', 1)
                ->where('blogs.is_delete', '=', 0)
                ->orderBy('blogs.id', 'desc')
                ->limit(3)
                ->get();
}
static public function getRelatedPost($category_id,$id)
{
    return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
                ->join('users', 'users.id', '=', 'blogs.user_id')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->where('blogs.id', '!=', $id)
                ->where('blogs.category_id', '=', $category_id)
                ->where('blogs.status', '=', 1)
                ->where('blogs.is_publish', '=', 1) 
                ->where('blogs.is_delete', '=', 0)
                ->orderBy('blogs.id', 'desc')
                ->limit(5)
                ->get();
}

static public function getRecordSlug($slug)
{
    return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
                ->join('users', 'users.id', '=', 'blogs.user_id')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->where('blogs.status', '=', 1)
                ->where('blogs.is_publish', '=', 1)
                ->where('blogs.is_delete', '=', 0)
                ->where('blogs.slug', '=', $slug)
                ->first();
}

static public function getRecord()
{
    $query = self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name', 'categories.slug as category_slug')
                ->join('users', 'users.id', '=', 'blogs.user_id')
                ->join('categories', 'categories.id', '=', 'blogs.category_id');

                if(!empty(Auth::check()) && Auth::user()->is_admin != 1)
                {
                    $query = $query->where('blogs.user_id', '=', Auth::user()->id);
                }

                if(!empty(Request::get('id')))
                {
                    $query = $query->where('blogs.id', '=', Request::get('id'));
                }
                if(!empty(Request::get('username')))
                {
                    $query = $query->where('users.name', 'like', '%' .Request::get('username').'%');
                }
                if(!empty(Request::get('title')))
                {
                    $query = $query->where('blogs.title', 'like', '%' .Request::get('title').'%');
                }
                if(!empty(Request::get('category')))
                {
                    $query = $query->where('categories.name', 'like', '%' .Request::get('category').'%');
                }
                if(!empty(Request::get('is_publish')))
                {
                    $is_publish = Request::get('is_publish');
                    if($is_publish == 100)
                    {
                        $is_publish = 0;
                    }
                    $query = $query->where('blogs.is_publish', '=', $is_publish);
                }
                if(!empty(Request::get('status')))
                {
                    $status = Request::get('status');
                    if($status == 100)
                    {
                        $status = 0;
                    }
                    $query = $query->where('blogs.status', '=', $status);
                }
                if(!empty(Request::get('start_date')))
                {
                    $query = $query->whereDate('blogs.created_at', '>=', Request::get('start_date'));
                }
                if(!empty(Request::get('end_date')))
                {
                    $query = $query->whereDate('blogs.created_at', '<=', Request::get('end_date'));
                }


                $query = $query->where('blogs.is_delete', '=', 0)
                ->orderBy('blogs.id', 'desc')
                ->paginate(30);
    return $query;
}
public function getImage()
{
    if(!empty($this->image_file) && file_exists('upload/blog/'.$this->image_file))
    {
        return url('upload/blog/'.$this->image_file);
    }
    else
    {
        return "";
    }
}
static public function getSingle($id)
{
    return self::find($id);
}
public function getTag()
{
    return $this->hasMany(BlogTag::class, 'blog_id');
}
public function getComment()
{
    return $this->hasMany(BlogComment::class, 'blog_id')->orderBy('blog_comments.id', 'desc');
}
public function getCommentCount()
{
    return $this->hasMany(BlogComment::class, 'blog_id')->count();
}

}
    