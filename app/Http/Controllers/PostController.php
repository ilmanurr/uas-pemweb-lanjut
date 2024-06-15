<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'post' => Post::latest()->get(),
            'categories' => Category::where('active', 'yes')->get()
        ]);
    }

    public function show()
    {
        return view('pengelola.post', [
            'post' => Post::latest()->get(),
            'categories' => Category::where('active', 'yes')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'categories' => Category::where('active', 'yes')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'category_id' => 'required|array',
            'content' => 'required',
            'image' => 'required|image|max:2048',
            'status' => 'required|in:publish,draft'
        ]);

        $data = $request->except('category_id', 'image');

        $file = $request->file('image');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/', $fileName);

        $data['image'] = $fileName;
        $data['seotitle'] = Str::slug($data['title']);
        $data['user_id'] = auth()->id();

        $data['active'] = $request->status == 'publish' ? 'Yes' : 'No';

        $post = Post::create($data);
        $post->categories()->attach($request->category_id);

        return redirect(route('admin.post.index'))->with('success', 'Data post has been created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('post.update', [
            'post' => Post::find($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'category_id' => 'required|array',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:publish,draft'
        ]);

        $data = $request->except('category_id', 'image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/img/', $fileName);

            if ($request->oldImg) {
                Storage::delete('public/img/'.$request->oldImg);
            }

            $data['image'] = $fileName;
        } else {
            $data['image'] = $request->oldImg;
        }

        $data['seotitle'] = Str::slug($data['title']);
        $data['active'] = $request->status == 'publish' ? 'Yes' : 'No';

        $post = Post::find($id);
        $post->update($data);
        $post->categories()->sync($request->category_id);

        return redirect(route('admin.post.index'))->with('success', 'Data post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        Storage::delete('public/img/' . $post->image);
        $post->delete();

        return response()->json([
            'message' => 'Data post has been deleted',
        ]);
    }
}