<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Category extends Model
{
    use HasFactory;

    public function posts() {

        return $this->hasMany(Post::class, 'category_id');
    }

    public function scopePublished($query) {
        return $query->where('state', 1)->withCount(['posts' => function (Builder $query) {
            $query
                ->where([
                    ['state', 'like', 1],
                    ['published_at', '<=' , Carbon::now()]
                ]);
        }]);
    }
}
