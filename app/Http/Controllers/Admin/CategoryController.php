<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('admin.category.view', compact('category'));
    }

    public function CategoryAdd()
    {
        return view('admin.category.add');
    }

    public function CategoryStore(Request $request)
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


            Category::insert([
                'category_name_eng'=> $request->category_name_eng,
                'category_name_urdu'=> $request->category_name_urdu,
                'category_slug_eng'=> strtolower(str_replace(' ', '-',$request->category_name_eng)) ,
                'category_slug_urdu'=> strtolower(str_replace(' ', '-',$request->category_name_urdu)),
                'category_img'=> $request->category_img,
            ]);

            return redirect()->route('all.category');

    }

    public function CategoryEdit(Request $request, $id){

        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }
    public function CategoryUpdate(Request $request){

        $category = Category::find($request->id);
        if(!empty($category)){

                Category::find($request->id)->update([
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
    public function CategoryDelete( $id){

        $category_img = Category::find($id)->category_img;
        unlink($category_img);
        $Category_del = Category::find($id)->delete();
        return redirect()->back();
    }
}
