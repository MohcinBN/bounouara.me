<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // get the form from post views
    public function getFormPost() {
        return view('post/add_form');
    }

    public function createPost(Request $request){

        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'

        ]);

        // Image treatement
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension(); 
        $destinationPath = public_path('/upload/');
        $thumb_img = Image::make($image->getRealPath())->resize(700, 300);
        $thumb_img->save($destinationPath.'/'.$imagename,80);


        // slug treatement from title
        $str = strtolower($request->title);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = preg_replace('/\s+/', '-', $str);
        $post->description = $request->description;
        $post->image = $imagename;
        $post->save();

        return redirect()->route('home')->with('success', 'Post has been added successfully!');
        
 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show latest 5 posts in homepage

        $posts = DB::table('posts')->orderBy('id', 'DESC')->paginate(5);

        return view('post.index', compact('posts'));
    }

    public function show($slug)
    {
         $post = Post::where('slug', $slug)->firstOrFail();
         return view('post.single', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit posts
        $post = Post::find($id);
        return view('post/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // update posts
        // Instance Model
        $post = Post::find($id);
        
        $request->validate([

            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'

        ]);

        if ($request->image != $post->image) {
            // Image treatement
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/upload/');
            $thumb_img = Image::make($image->getRealPath())->resize(700, 300);
            $thumb_img->save($destinationPath.'/'.$imagename,80);

            if(file_exists($image)){
                @unlink($image);
            }
        }
        else {
            $imagename = $post->image;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imagename;
        $post->save();
        return redirect()->route('home')->with('success', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete post
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post has been deleted :( :(');
    }



}
