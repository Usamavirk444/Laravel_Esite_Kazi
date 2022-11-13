<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $subcategory = SubCategory::latest()->get();
        $category = Category::latest()->get();
        return view('admin.sub_category.view', compact('subcategory','category'));
    }

    public function SubCategoryAdd()
    {
        $category = Category::all();
        return view('admin.sub_category.add',compact('category'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
            'subcategory_name_eng'=> 'required',
            'subcategory_name_urdu'=> 'required',
        ],[
           'category_id.required'  => 'Select Any field',
           'subcategory_name_eng.required'  => 'English Name field is required',
           'subcategory_name_urdu.required'  => 'Urdu Name field is required',

        ]);


        SubCategory::insert([
                'category_id'=> $request->category_id,
                'subcategory_name_eng'=> $request->subcategory_name_eng,
                'subcategory_name_urdu'=> $request->subcategory_name_urdu,
                'subcategory_slug_eng'=> strtolower(str_replace(' ', '-',$request->subcategory_name_eng)) ,
                'subcategory_slug_urdu'=> strtolower(str_replace(' ', '-',$request->subcategory_name_urdu)),
            ]);

            return redirect()->route('all.subcategory');

    }

    public function SubCategoryEdit(Request $request, $id){
        $category = Category::all();
        $subcategory = SubCategory::find($id);
        return view('admin.sub_category.edit',compact('subcategory','category'));

    }
    public function SubCategoryUpdate(Request $request){

        $category = SubCategory::find($request->id);
        if(!empty($category)){

            SubCategory::find($request->id)->update([
                    'subcategory_name_eng'=> $request->subcategory_name_eng,
                    'subcategory_name_urdu'=> $request->subcategory_name_urdu,
                    'subcategory_slug_eng'=> strtolower(str_replace(' ', '-',$request->subcategory_name_eng)) ,
                    'subcategory_slug_urdu'=> strtolower(str_replace(' ', '-',$request->subcategory_name_urdu)),
                ]);
                return redirect()->route('all.subcategory');

        }
        return view('admin.subcategory.edit',compact('category'));

    }
    public function SubCategoryDelete( $id){

        $SubCategory_del = SubCategory::find($id)->delete();
        return redirect()->back();
    }
}
