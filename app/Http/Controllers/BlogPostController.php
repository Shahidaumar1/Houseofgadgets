<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function edit($id){
        $belogpost = BlogPost::find( $id);
        return view('admin.blogs.blogPost',compact('belogpost'));
    }
    public function update(Request $request, $id)
    {
        BlogPost::where('id', $id)->update([
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect('blog/view')->with('status', 'Blog Updated Successfully !!');
    }



}
