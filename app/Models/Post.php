<?php

namespace App\Models;

use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use function Laravel\Prompts\search;

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

    public function scopeFilter(Builder $query, array $filters): void {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     $query->where('title', 'like', '%'.request('search').'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%'.$search.'%');
        });

        // $query->when($filters['category'] ?? false, function($query, $category) {
        //     $query->whereHas('category', function ($query) use ($category) { $query->where('slug', $category); }
        //     );
        // });
        $query->when($filters['category'] ?? false, function($query, $category) {
            $query->whereHas('category', fn ($query) => $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            $query->whereHas('author', fn ($query) => $query->where('username', $author)
            );
        });
    }
}