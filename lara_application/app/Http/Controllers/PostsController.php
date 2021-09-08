<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function index(){

    $popular = Post::filtered()->get();

        foreach ($popular as $item) {

            if($item->category->state != 1) {
                $item->state = 0;
                $item->save();
                return redirect('/');
            }
    }

        return view('categories' , [
            'categories' => Category::latest()->published()->get(),
            'popular' => $popular
        ]);
    }

    public function showCategory(Category $category) {

        if($category->state == 0) {
            return redirect('/news');
        };

        return view('news' , [
            'currentCategory' => $category,
            'posts' => $category->posts()->published()
                ->paginate(10),
            'posts_in' => $category->posts()->published()->count(),
            'popular' => Post::filtered()
                ->where('category_id', '=', $category->id)->get()

        ]);
    }

    public function showPost($slug, $id) {

        $searcher = Post::find($id);

        if($searcher->state == 0 || $searcher->category->state == 0 ) {
            return redirect('/news');
        };

        event('postHasViewed', $searcher);
        return view('post' , [
            'post' => $searcher,
            'popular' => Post::filtered()
                ->where('category_id', '=', $searcher->category_id)
                ->where('title', '!=', $searcher->title)->get()
        ]);
    }
}

