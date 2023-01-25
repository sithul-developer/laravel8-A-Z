<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    //
    public function allBrands()
    {

        $brands = Brands::where('status', 1)->latest()->paginate(3);
        return view('admin.brands.index', compact('brands'));
    }


    public function addBrads(request $request)
    {
        $validated = $request->validate(
            ['brands_name' => 'required|unique:brands|max:255|min:4',],
            ['brands_image.required' => 'please input brands image ',],
        );
        //

     /*    $file_name = time() . '.' . request()->brands_image->getClientOriginalExtension();
        request()->brands_image->move(public_path('image/brand/'), $file_name); */
       $brands_image=$request->file('brands_image');
        $image_name_genr = Str::uuid();
        $image_extenstion = strtolower($brands_image->getClientOriginalExtension());
        $new_img_name = $image_name_genr.'.'.$image_extenstion;
        $updoad_location ='image/brand/';
        $final_image_name = $updoad_location . $new_img_name;
        $brands_image ->move($updoad_location , $new_img_name);
        //
        Brands::insert([
            'user_id' => Auth::user()->id,
            'brands_name' => $request->brands_name,
            'brands_image' =>$final_image_name,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => NULL,
        ]);
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

}
