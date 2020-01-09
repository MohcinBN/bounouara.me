<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category list
    public function index()
        {
            $categories = Category::paginate(10);
            //$categories_to_select = Category::all();


            return view('admin.category.list', compact('categories'));
        }
    // index with category in create post 
    public function index_()
    {
            $categories = Category::all();
            //$categories_to_select = Category::all();
    
    
            return view('admin.post.add_form', compact('categories'));
    }



    // get add view
    public function new()
        {
            return view('admin.category.new');
        }

    // store category
    public function add_category(Request $request)
    {
        $this->validate($request, [

            'cat_name' => 'required'

        ]);    

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category has been added successfully!');
        
    }

    // edit category
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update_category(Request $request, $id)
    {

        $category = Category::find($id);

        $this->validate($request, [

            'cat_name' => 'required'

        ]); 

        $category->cat_name = $request->cat_name;
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category has been updated successfully!');

    }


    // delete category
    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.list')->with('success', 'Category has been deleted :( :(');
    }

    // get posts by category.. 

    //  public function get_post_by_category()
    //  {
    //     $posts_category = Post::with('category')->get();

    //     //  return response()->json([
    //     //      'posts_category'=>$posts_category
    //     //   ],200);

    //     return view('public.category.post_category', compact('posts_category'));
    //  }


}
