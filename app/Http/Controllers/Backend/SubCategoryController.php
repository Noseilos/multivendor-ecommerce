<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){

        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));

    } // END AllSubCategory 





    public function AddSubCategory(){

        $categories = Category::orderBy('category_name','ASC')->get();
      return view('backend.subcategory.subcategory_add',compact('categories'));

    }// END AddSubCategory 





    public function StoreSubCategory(Request $request){ 

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
        ]);

       $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification); 

    }// END StoreSubCategory 





    public function EditSubCategory($id){

        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
  
      }// END EditSubCategory 


  
  
  
      public function UpdateSubCategory(Request $request){
  
          $subcat_id = $request->id;
  
           SubCategory::findOrFail($subcat_id)->update([
              'category_id' => $request->category_id,
              'subcategory_name' => $request->subcategory_name,
              'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
          ]);
  
         $notification = array(
              'message' => 'SubCategory Updated Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('all.subcategory')->with($notification); 
  
  
      }// END UpdateSubCategory 



  
  
        public function DeleteSubCategory($id){

            SubCategory::findOrFail($id)->delete();

            $notification = array(
                'message' => 'SubCategory Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification); 


        }// END DeleteSubCategory 





        public function GetSubCategory($category_id){

            $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
                return json_encode($subcat);

        }// END GetSubCategory 
}
