<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    protected $table = 'blog_tags';

    static public function InsertDeleteTags($blog_id, $tags)
    {
        // Delete existing tags for the blog post
        BlogTag::where('blog_id', '=', $blog_id)->delete();

        if (!empty($tags)) {
            // Split the tags string into an array
            $tagsArray = explode(",", $tags);

            // Insert new tags
            foreach ($tagsArray as $tag) {
                $blogTag = new BlogTag;
                $blogTag->blog_id = $blog_id;
                $blogTag->name = trim($tag); 
                $blogTag->save();
            }
        }
    }
}
