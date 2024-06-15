<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('home.main-page', [
            'posts' => Post::where('status', 'publish')->latest()->get(),
            'categories' => Category::where('active', 'yes')->get(),
        ]);
    }

    public function index() {
        return view('home.main-page', [
            'posts' => Post::where('status', 'publish')->latest()->get(),
            'categories' => Category::where('active', 'yes')->get(),
            'topPosts' => Post::where('status', 'publish')->latest()->take(3)->get(),
            'latestPosts' => Post::where('status', 'publish')->latest()->take(6)->get(),
            'popularPosts' => Post::where('status', 'publish')->orderBy('hits', 'desc')->take(6)->get()
        ]);
    }

    public function allPost()
    {
        $allPosts = Post::where('status', 'publish')->latest()->paginate(9);
        $categories = Category::where('active', 'yes')->get();

        return view('home.all-news', [
            'allPosts' => $allPosts,
            'categories' => $categories,
        ]);
    }

    public function detailPost($id) {
        $post = Post::where('status', 'publish')->findOrFail($id);
    
        $post->increment('hits');
    
        $categories = Category::where('active', 'yes')->get();
        $popularPosts = Post::where('status', 'publish')->orderBy('hits', 'desc')->take(6)->get();
    
        return view('home.single-page', compact('post', 'categories', 'popularPosts'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $postCount = $category->publishedPosts()->count();
        if ($postCount > 6) {
            $posts = $category->publishedPosts()->latest()->paginate(6);
        } else {
            $posts = $category->publishedPosts()->latest()->take(6)->get();
        }
        $categories = Category::where('active', 'yes')->get();
        $popularPosts = Post::where('status', 'publish')->orderBy('hits', 'desc')->take(6)->get();

        return view('home.category', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
            'popularPosts' => $popularPosts
        ]);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('status', 'publish')
                    ->where(function ($queryBuilder) use ($query) {
                        $queryBuilder->where('title', 'like', "%{$query}%")
                                    ->orWhere('content', 'like', "%{$query}%");
                    })
                    ->paginate(9); 

        $categories = Category::where('active', 'yes')->get();
        $allPosts = Post::where('status', 'publish')->latest()->paginate(9);

        return view('home.search-result', [
            'query' => $query,
            'posts' => $posts,
            'categories' => $categories,
            'allPosts' => $allPosts,
        ]);
    }

    public function contact() {
        return view('home.contact', [
            'posts' => Post::where('status', 'publish')->latest()->get(),
            'categories' => Category::where('active', 'yes')->get(),
        ]);
    }

    public function dashboardAdmin() {
        $publishedPostsCount = Post::where('status', 'publish')->count();
        $draftPostsCount = Post::where('status', 'draft')->count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $totalHits = Post::where('status', 'publish')->sum('hits');

        return view('admin.dashboard', [
            'publishedPostsCount' => $publishedPostsCount,
            'draftPostsCount' => $draftPostsCount,
            'categoriesCount' => $categoriesCount,
            'usersCount' => $usersCount,
            'totalHits' => $totalHits,
        ]);
    }

    public function dashboardPengelola() {
        $publishedPostsCount = Post::where('status', 'publish')->count();
        $draftPostsCount = Post::where('status', 'draft')->count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        $totalHits = Post::where('status', 'publish')->sum('hits');

        return view('pengelola.dashboard', [
            'publishedPostsCount' => $publishedPostsCount,
            'draftPostsCount' => $draftPostsCount,
            'categoriesCount' => $categoriesCount,
            'usersCount' => $usersCount,
            'totalHits' => $totalHits,
        ]);
    }
}