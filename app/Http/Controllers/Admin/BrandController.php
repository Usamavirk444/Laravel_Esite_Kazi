<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brnad;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brand = Brnad::latest()->get();
        return view('admin.brand.view', compact('brand'));
    }

    public function brandAdd()
    {
        return view('admin.brand.add');
    }

    public function brandStore(Request $request)
    {

        $request->validate([
            'nameEng'=> 'required',
            'nameUrdu'=> 'required',
            'img'=> 'required',
        ],[
           'nameEng.required'  => 'English Name field is required',
           'nameUrdu.required'  => 'Urdu Name field is required',
           'img.required'  => 'Image field is required',
        ]);

        if( $image = $request->file('img')){

            $image = $request->file('img');
            $name_genrate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('assets/upload/brand/'.$name_genrate);
            $save_url = 'assets/upload/brand/'.$name_genrate;
            Brnad::insert([
                'brand_name'=> $request->nameEng,
                'brand_name_urdu'=> $request->nameUrdu,
                'brand_slug_eng'=> strtolower(str_replace(' ', '-',$request->nameEng)) ,
                'brand_slug_urdu'=> strtolower(str_replace(' ', '-',$request->nameUrdu)),
                'brand_img'=> $save_url,
            ]);

            return redirect()->route('all.brands');
        }
    }

    public function brandEdit(Request $request, $id){

        $brand = Brnad::find($id);
        return view('admin.brand.edit',compact('brand'));

    }
    public function brandUpdate(Request $request){

        $brand = Brnad::find($request->id);
        if(!empty($brand)){
            if( $image = $request->file('img')){

                unlink($brand->brand_img);
                $image = $request->file('img');
                $name_genrate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('assets/upload/brand/'.$name_genrate);
                $save_url = 'assets/upload/brand/'.$name_genrate;
                Brnad::find($request->id)->update([

                    'brand_img'=> $save_url,
                ]);
            }
                Brnad::find($request->id)->update([
                    'brand_name'=> $request->nameEng,
                    'brand_name_urdu'=> $request->nameUrdu,
                    'brand_slug_eng'=> strtolower(str_replace(' ', '-',$request->nameEng)) ,
                    'brand_slug_urdu'=> strtolower(str_replace(' ', '-',$request->nameUrdu)),

                ]);
                return redirect()->route('all.brands');

        }


        return view('admin.brand.edit',compact('brand'));

    }
    public function brandDelete(Request $request, $id){

        $brand_img = Brnad::find($id)->brand_img;
        unlink($brand_img);
        $brnad_del = Brnad::find($id)->delete();

        return redirect()->back();



    }
}
