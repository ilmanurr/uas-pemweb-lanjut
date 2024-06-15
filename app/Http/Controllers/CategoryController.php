<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level == 'pengelola') {
            return view('category.index', [
                'categories' => Category::latest()->get()
            ]);
        } elseif (Auth::user()->level == 'admin') {
            return view('admin.category', [
                'categories' => Category::latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:191',
            'active' => 'required|in:Yes,No',
        ]);

        $data['seotitle'] = Str::slug($data['title']);

        Category::create($data);

        if (Auth::user()->level == 'pengelola') {
            return view('category.index', [
                'categories' => Category::latest()->get()
            ])->with('success', 'Category has been created');
        } elseif (Auth::user()->level == 'admin') {
            return view('admin.category', [
                'categories' => Category::latest()->get()
            ])->with('success', 'Category has been created');;
        }
    }

    public function show($seotitle)
    {
        $category = Category::where('seotitle', $seotitle)->firstOrFail();
        $posts = $category->publishedPosts()->paginate(10); // Misalnya, tampilkan 10 postingan per halaman
    
        return view('home.category', compact('category', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|max:191',
            'active' => 'required|in:Yes,No',
        ]);

        $data['seotitle'] = Str::slug($data['title']);

        Category::find($id)->update($data);

        if (Auth::user()->level == 'pengelola') {
            return view('category.index', [
                'categories' => Category::latest()->get()
            ])->with('success', 'Category has been updated');
        } elseif (Auth::user()->level == 'admin') {
            return view('admin.category', [
                'categories' => Category::latest()->get()
            ])->with('success', 'Category has been updated');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['success' => 'Category has been deleted']);
        }
        return response()->json(['error' => 'Category not found'], 404);
    }

}