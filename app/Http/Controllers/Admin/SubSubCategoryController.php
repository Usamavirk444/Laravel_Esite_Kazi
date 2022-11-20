<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $subsubcategory = SubSubCategory::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $category = Category::latest()->get();
        return view('admin.sub_sub_category.view', compact('subsubcategory','category'));
    }

    public function SubSubCategoryAdd()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('admin.sub_sub_category.add',compact('category','subcategory'));
    }

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'subsubcategory_name_eng'=> 'required',
            'subsubcategory_name_urdu'=> 'required',
        ],[
           'category_id.required'  => 'Select Any field',
           'subcategory_id.required'  => 'Select Any field',
           'subsubcategory_name_eng.required'  => 'English Name field is required',
           'subsubcategory_name_urdu.required'  => 'Urdu Name field is required',

        ]);


        SubSubCategory::insert([
                'category_id'=> $request->category_id,
                'subcategory_id'=> $request->subcategory_id,
                'subsubcategory_name_eng'=> $request->subsubcategory_name_eng,
                'subsubcategory_name_urdu'=> $request->subsubcategory_name_urdu,
                'subsubcategory_slug_eng'=> strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)) ,
                'subsubcategory_slug_urdu'=> strtolower(str_replace(' ', '-',$request->subsubcategory_name_urdu)),
            ]);

            return redirect()->route('all.subsubcategory');

    }

    public function SubSubCategoryEdit(Request $request, $id){
        $category = Category::all();
        $subcategory = SubCategory::all();
        $subsubcategory = SubSubCategory::find($id);
        return view('admin.sub_sub_category.edit',compact('subsubcategory','subcategory','category'));

    }
    public function SubSubCategoryUpdate(Request $request){

        $category = SubSubCategory::find($request->id);
        if(!empty($category)){

            SubSubCategory::find($request->id)->update([
                'category_id'=> $request->category_id,
                'subcategory_id'=> $request->subcategory_id,
                'subsubcategory_name_eng'=> $request->subsubcategory_name_eng,
                'subsubcategory_name_urdu'=> $request->subsubcategory_name_urdu,
                'subsubcategory_slug_eng'=> strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)) ,
                'subsubcategory_slug_urdu'=> strtolower(str_replace(' ', '-',$request->subsubcategory_name_urdu)),
                ]);
                return redirect()->route('all.subsubcategory');

        }
        return redirect()->back();

    }
    public function SubSubCategoryDelete( $id){

        $SubCategory_del = SubSubCategory::find($id)->delete();
        return redirect()->back();
    }

    public function ajaxCall($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_eng','ASC')->get();
        return json_encode($subcat);
    }
}
