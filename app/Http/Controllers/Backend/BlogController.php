<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function AllBlogCategory(){

        $blog_cat = BlogCategory::latest()->get();
        return view('backend.blog.category.all_blog_category', compact('blog_cat'));

    }// End Method 

    public function AddBlogCategory(){

        return view('backend.blog.category.add_blog_category');

    }// End Method 

    public function StoreBlogCategory(Request $request){

        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification); 

    }// End Method 

    public function EditBlogCategory($id){


        $blog_category = BlogCategory::findOrFail($id);
        return view('backend.blog.category.edit_blog_category', compact('blog_category')); 

    }// End Method 

    public function UpdateBlogCategory(Request $request){

        $blog_category_id = $request->id;
        BlogCategory::findOrFail($blog_category_id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification); 

    }// End Method 

    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification); 

    }// End Method



    // ********************** Blog Post Methods **********************


    
    public function AllBlogPost(){

        $blog_post = BlogPost::latest()->get();
        return view('backend.blog.post.all_blog_post', compact('blog_post'));

    }// End Method 

    public function AddBlogPost(){
        
        $blog_category = BlogCategory::latest()->get();
        return view('backend.blog.post.add_blog_post', compact('blog_category'));

    }// End Method 
}
