<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = blog::all();
        $blogPost = BlogPost::where('id',1)->first();
        return view('admin.blogs.index', compact('blogs','blogPost'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)

    {
        $validator = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif',
            'heading' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->move('storage/blog_image', $fileNameToStore);
            $path = public_path() . '/storage/blog_image/' . $fileNameToStore;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
        }
        Blog::create([
            'heading' => $request->heading,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileNameToStore
        ]);
        return redirect(route('blogV'))->with('status', 'Blog Added Successfully !!');
    }

    public function edit($id)
    {

        $blogs = Blog::where('id', $id)->first();

        return view('admin.blogs.edit', compact('blogs'));
    }



    public function update(Request $request, $id)

    {
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move('storage/blog_image', $fileNameToStore);
            $path = public_path().'/storage/blog_image/' . $fileNameToStore;
            $path = public_path().'/storage/blog_image/' . $fileNameToStore;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            Blog::where('id', $id)->update([
                'image' => $fileNameToStore
            ]);
        }
        Blog::where('id', $id)->update([
            'heading' => $request->heading,
            'title' => $request->title,
            'description' => $request->description,
        ]);


        return redirect(route('blogV'))->with('status', 'Blog Updated Successfully !!');
    }

    public function destroy($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();

        return redirect(route('blogV'));
    }
    public function detail($id){
        return view('frontend.blog.detail');
    }

}
