<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Expr\Cast\Array_;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'author', 'isi', 'category'];

    protected $with = ['author', 'category'];

    public static function findPost($slug): array {
        // return Arr::first(static::getPost(), function($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        };

        return $post;
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}