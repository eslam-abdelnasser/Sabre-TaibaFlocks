<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\About ;
use App\Models\AboutDescription ;
use App\Models\Language ;

class AboutUsController extends Controller
{
    //
    public function getAboutUs(){


        $about = About::updateOrCreate([

            'id'=>1
        ]);



        $languages = Language::where('status','1')->get();



        foreach($languages as $lang){

            $content =  AboutDescription::updateOrCreate([

                'about_id'=>$about->id ,
                'lang_id'=>$lang->id

            ]);



        }

        return view('admin.about-us.index' , ['about'=>$about , 'languages'=>$languages] ) ;


    }

    public function updateAboutUs(Request $request , $id){


        $rules = [

            'title_en'=>'required',
            'title_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required'



        ];


        $this->validate($request , $rules) ;


        $about = About::find($id);




        foreach($about->description as $value){



            $value->title = $request->input('title_'.$value->language->label);
            $value->description = $request->input('description_'.$value->language->label);
            $value->meta_title = $request->input('meta_title_'.$value->language->label);
            $value->meta_description = $request->input('meta_description_'.$value->language->label);

            $value->save();

        }


        // flash a message to tell admin that article is added

        session()->flash('message','تم تحديث البيانات  بنجاح');

        return redirect()->route('admin.about.index');



    }
}
