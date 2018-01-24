<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package ;
use App\Models\PackagesGallery ;
use Image;
class PackageGalleryController extends Controller
{
    //

    public function index($id){
//        dd(Package::find($id));

        $package_images = PackagesGallery::where('package_id','=',$id)->get();
        return view('admin.packages.images.view')->withPackageImages($package_images);
    }


    public function create($id){

        return view('admin.packages.images.create')->withPackageId($id);
    }


    public function addImages(Request $request , $id){

//        dd($request);
        if($request->hasFile('file')){
            $files = $request->file('file');
            $dir = public_path().'/uploads/packages/images/';

            foreach ($files as $file) {
                $packageImages = new PackagesGallery();
                $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
                $file->move($dir , $fileName);
                $packageImages->image_url = $fileName;
                $packageImages->package_id = $id ;
                $packageImages->save();
                Image::make($dir . $fileName)->resize(50, 36)->save($dir .'thumb/'. $fileName);
                Image::make($dir . $fileName)->resize(770, 321)->save($dir .'resized/'. $fileName);
            }

        }

    }


    public function delete($id){
        PackagesGallery::destroy($id);
        return redirect()->back();
    }
}
