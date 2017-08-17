<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class BlogController extends Controller
{
	protected $limit = 3;

    public function index()
    {
    	$posts = Post::with('author', 'tags', 'category')
    				->latestFirst()
    				->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->simplePaginate($this->limit);

    	return view("blog.index", compact('posts'));
    }

    public function category(Category $category)
    {
    	$categoryName = $category->title;

    	$posts = $category->posts()
	    				->with('author', 'tags')
	    				->latestFirst()
	    				->published()
	    				->simplePaginate($this->limit); 			

    	return view("blog.index", compact('posts', 'categoryName'));
    }

    public function tag(Tag $tag)
    {
    	$tagName = $tag->name;

    	$posts = $tag->posts()
	    				->with('author', 'category')
	    				->latestFirst()
	    				->published()
	    				->simplePaginate($this->limit); 			

    	return view("blog.index", compact('posts', 'tagName'));
    }

    public function show(Post $post)
    {
        // update posts set view_count = view_count + 1 where id = ?
        $post->increment('view_count');

    	return view("blog.show", compact('post'));
    }

    public function author(User $author)
    {
        $authorName = $author->name;
        
        $posts = $author->posts()
                        ->with('category', 'tags')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);             

        return view("blog.index", compact('posts', 'authorName'));
    }
}
