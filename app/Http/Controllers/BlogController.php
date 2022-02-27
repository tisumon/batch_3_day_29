<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogs;
    protected $blog;


    public function index()
    {
        return view('add-blog');

    }
    public function create(Request $request)
    {
        $this->blog = new blog();
        $this->blog->title = $request->title;
        $this->blog->author = $request->author;
        $this->blog->description = $request->description;
        $this->blog->save();

        return redirect()->back()->with('message', 'Blog info save successfully.');
    }
    public function manage()
    {
        $this->blogs = Blog::orderby('id','desc')->get();
        return view('manage-blog',['blogs'=> $this->blogs]);
    }
    public  function edit($id)
    {
        $this->blog = Blog::find($id);

        return view ('edit-blog',['blog' => $this->blog]);
    }

}
