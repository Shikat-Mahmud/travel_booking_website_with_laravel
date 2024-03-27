<?php

namespace Modules\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\App\Models\Blog;
use Modules\Blog\App\Models\Comment;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Eager load the tags relationship
            $blogs = Blog::all();
            return view('blog::main.index', compact('blogs'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
        $categories = Category::where('status', 1)->get();
        return view('blog::main.create', compact('categories'));
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'nullable|string', 
            'long_description' => 'nullable',
            'short_description' => 'nullable',
            'status' => 'required|in:active,inactive',
        ]);

        $inputs = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $inputs['image'] = $imagePath;
        }

        Blog::create($inputs);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}



    

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        try {
            
            $blog = Blog::findOrFail($id);

            return view('blog::main.show', compact('blog'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', 'Blog not found.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $blog = Blog::findOrFail($id);


        return view('blog::main.edit',[
            'blog'=>Blog::find($id),
            'categories'=>Category::where('status',1)->get(),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'status' => 'nullable|in:active,inactive',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'title' => 'required',
                'category_id' => 'required|exists:categories,id',
                'tag_id' => 'nullable|string',
                'long_description' => 'nullable',
                
                
                'short_description' => 'nullable',
            ]);

            $blog = Blog::findOrFail($id);

            $requestData = $request->all();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('blog_images', 'public');
                $requestData['image'] = $imagePath;
            } else {
                unset($requestData['image']);
            }

            $blog->update($requestData);

            return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $blog = Blog::findOrFail($id);


            $blog->delete();


            return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function blog()
    {
        try {
            $blogs = Blog::where('status', 'active')->paginate(3);
            // $blogs = Blog::all(); 
            $recentBlogs = Blog::orderByDesc('created_at')->take(5)->get();
            return view('blog::main.blog', compact('blogs','recentBlogs')); 
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    


    public function blogdetails($id)
{
    try {
        $blog = Blog::findOrFail($id);
        
        $comments = Comment::where('blog_id', $id)->where('status', 'approved')->get();
        
        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();

        $nextPost = Blog::where('id', '>', $blog->id)->orderBy('id')->first();
        $recentBlogs = Blog::orderByDesc('created_at')->take(5)->get();
        $allTags = Blog::pluck('tag_id')->unique()->filter()->values();
        return view('blog::main.blog-details', compact('blog', 'comments', 'previousPost', 'nextPost','recentBlogs','allTags'));
    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

    
public function storeComment(Request $request)
{
    try {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment,
            'status' => 'pending', 
        ]);

        return redirect()->back()->with('success', 'Your comment has been submitted and is awaiting moderation.');
    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

public function indexComment()
    {
        try {
            // Eager load the tags relationship
            $comments = Comment::all();
            return view('blog::main.comments.index', compact('comments'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function updateComment(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,approved', 
            ]);

            $comment = Comment::findOrFail($id);
            $comment->status = $request->status;
            $comment->save();

            return redirect()->route('comments.index', ['id' => $comment->blog_id])->with('success', 'Comment status updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
