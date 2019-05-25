<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MyController extends Controller
{
    public function indexx(){
    	$categories = DB::table('categories')
                ->where('categories_type', 'published')
                ->orderBy('categories_id', 'ASC')
                ->get();

        $posts = DB::table('posts')
                ->where('categories_type', 'published')
                ->orderBy('posts_id', 'ASC')
                ->paginate(2);

        $recentPosts = DB::table('posts')
                ->where('categories_type', 'published')
                ->orderBy('posts_id', 'DESC')
                ->limit(5)
                ->get();

        $popular = DB::table('posts')
                ->where('categories_type', 'published')
                ->orderBy('posts_hit_count', 'DESC')
                ->limit(5)
                ->get();

        return view('layouts.home')
                ->with('data', $categories)
                ->with('posts', $posts)
                ->with('recent', $recentPosts)
                ->with('p_post', $popular);
    }
    public function gallery(){
        $categories = DB::table('categories')
            ->where('categories_type', 'published')
            ->orderBy('categories_id', 'ASC')
            ->get();

        $posts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'ASC')
            ->get();

        $recentPosts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'DESC')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();
        return view('layouts.gallery')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular);
    }
    public function categories(){
        $categories = DB::table('categories')
            ->where('categories_type', 'published')
            ->orderBy('categories_id', 'ASC')
            ->get();

        $posts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'ASC')
            ->get();

        $recentPosts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'DESC')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();
        return view('layouts.categories')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular);
    }
    public function archives(){
        $categories = DB::table('categories')
            ->where('categories_type', 'published')
            ->orderBy('categories_id', 'ASC')
            ->get();

        $posts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'ASC')
            ->get();

        $recentPosts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'DESC')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();
        return view('layouts.archives')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular);
    }
    public function about(){
        $categories = DB::table('categories')
            ->where('categories_type', 'published')
            ->orderBy('categories_id', 'ASC')
            ->get();

        $posts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'ASC')
            ->get();

        $recentPosts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'DESC')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();
        return view('layouts.about')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular);
    }
    public function contact(){
        $categories = DB::table('categories')
            ->where('categories_type', 'published')
            ->orderBy('categories_id', 'ASC')
            ->get();

        $posts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'ASC')
            ->get();

        $recentPosts = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_id', 'DESC')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();
        return view('layouts.contact')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular);
    }
}
