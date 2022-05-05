<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'slug',
        'category_id',
    ];

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public static function getUniqueSlug($title)
    {
        //   metodo per creare slug
        $slug = Str::slug($title);
        $slug_base = $slug;
        $counter = 1;

        // metodo per recupeare il primo  slug uguale nella tabella post
        $post_present = Post::where('slug', $slug)->first();

        while ($post_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        }
        return $slug;
    }

 
 }
