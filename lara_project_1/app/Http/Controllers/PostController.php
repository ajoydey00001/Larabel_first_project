<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function create()
    {
        return view('create');
    }
    public function ourfilestore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        } 
        
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName; // Use $imageName instead of recalculating
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function editData($id)
    {
       $post = Post::findOrFail($id);
        return view('edit', ['ourPost' => $post]);
    }

    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully.');


    }
    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        flash()->success('Post deleted successfully.');
        return redirect()->route('home');
    }
    
}
