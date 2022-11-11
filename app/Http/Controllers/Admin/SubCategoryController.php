<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $category = SubCategory::latest()->get();
        return view('admin.category.view', compact('category'));
    }

    public function SubCategoryAdd()
    {
        return view('admin.category.add');
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_name_eng'=> 'required',
            'category_name_urdu'=> 'required',
            'category_img'=> 'required',
        ],[
           'category_name_eng.required'  => 'English Name field is required',
           'category_name_urdu.required'  => 'Urdu Name field is required',
           'category_img.required'  => 'Image field is required',
        ]);


        SubCategory::insert([
                'category_id'=> $request->category_id,
                'category_name_urdu'=> $request->category_name_urdu,
                'category_slug_eng'=> strtolower(str_replace(' ', '-',$request->category_name_eng)) ,
                'category_slug_urdu'=> strtolower(str_replace(' ', '-',$request->category_name_urdu)),
                'category_img'=> $request->category_img,
            ]);

            return redirect()->route('all.category');

    }

    public function SubCategoryEdit(Request $request, $id){

        $category = SubCategory::find($id);
        return view('admin.category.edit',compact('category'));

    }
    public function SubCategoryUpdate(Request $request){

        $category = SubCategory::find($request->id);
        if(!empty($category)){

            SubCategory::find($request->id)->update([
                    'category_name_eng'=> $request->category_name_eng,
                    'category_name_urdu'=> $request->category_name_urdu,
                    'category_slug_eng'=> strtolower(str_replace(' ', '-',$request->category_name_eng)) ,
                    'category_slug_urdu'=> strtolower(str_replace(' ', '-',$request->category_name_urdu)),
                    'category_img'=> $request->category_img,

                ]);
                return redirect()->route('all.category');

        }
        return view('admin.category.edit',compact('category'));

    }
    public function SubCategoryDelete( $id){

        $SubCategory_img = SubCategory::find($id)->category_img;
        unlink($SubCategory_img);
        $SubCategory_del = SubCategory::find($id)->delete();
        return redirect()->back();
    }
}
