<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query) {
        return $query
            ->where('state', 1)
            ->where('published_at', '<=' , Carbon::now())->orderBy('published_at', 'desc');
    }

    public function scopeFiltered($query) {

        $endDate = Carbon::now()->subWeek();
        $startDate = Carbon::now();

        return $query
            ->where('state', '=', 1)
            ->orderBy('view_count', 'desc')
            ->whereBetween('published_at', [$endDate, $startDate])
            ->take(3);
    }
}
