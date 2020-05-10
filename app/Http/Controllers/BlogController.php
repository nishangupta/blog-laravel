<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Events\UserCommentedOnBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at')->paginate(30);
        foreach ($blogs as $blog) {
            $blog->summary = Str::limit($blog->body, 200, $end = '...');
        }
        return view('blog.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest();
        $blog = new Blog;
        $blog->title = request()->title;
        $blog->body = request()->body;
        $blog->user_id = auth()->user()->id;
        $blog->save();

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('blog.edit')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);
        $this->validateRequest();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();
        return redirect('/profile');
    }

    public function addComment($blog_id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required|min:4'
        ]);

        $comment = new Comment;
        $comment->name = request()->name;
        $comment->comment = request()->comment;
        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $blog_id;
        if ($comment->save()) {
            event(new UserCommentedOnBlog(auth()->user()->name, $comment));
        }

        return redirect('blog/' . $blog_id);
    }
    public function markAllNotificationsAsRead()
    {
        auth()->user()->notifications->markAsRead();
        return redirect('/blog');
    }

    public function blogFinder()
    {
        $ipt = request()->finder;
        if ($ipt === null) {
            $blogs = Blog::orderBy('created_at', 'desc')->paginate(100);
        } else {
            $blogs = Blog::orderBy('created_at', 'desc')
                ->where('title', 'like', '%' . $ipt . '%')
                ->orWhere('body', 'like', '%' . $ipt . '%')
                ->paginate(50);
        }
        return view('blog.blog-finder')->with(['blogs' => $blogs]);
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',
            'body' => 'required',
        ]);
    }
}
