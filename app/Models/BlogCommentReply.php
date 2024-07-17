<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReply extends Model
{
    use HasFactory;
    protected $table = 'blog_comment_replies';

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
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
}
