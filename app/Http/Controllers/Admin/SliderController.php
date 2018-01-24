<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderDescription;
use App\Models\Language;
use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sliders = Slider::all();
//        dd($sliders);
        return view('admin.slider.index')->withSliders($sliders);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status','=','1')->get();

        return view('admin.slider.create')->withLanguages($languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'first_text_en' => 'required|max:255',
            'first_text_ar' => 'required|max:255',
            'second_text_en' => 'required|max:255',
            'second_text_ar' => 'required|max:255',
            'third_text_en' => 'required|max:255',
            'third_text_ar' => 'required|max:255',
            'image_cover'=> 'required|image',

        ]);

        //
        $slider = new Slider();

        $dir = public_path().'/uploads/slider/';
        $file = $request->file('image_cover');
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        Image::make($dir . $fileName)->resize(1920,920)->save($dir . $fileName);
        $slider->image_url = $fileName;

        $slider->save();




        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $slider_text = new SliderDescription();
            $slider_text->first_text = $request->input('first_text_'.$language->label);
            $slider_text->second_text = $request->input('second_text_'.$language->label);
            $slider_text->third_text = $request->input('third_text_'.$language->label);

            $slider_text->lang_id = $language->id;
            $slider_text->slider_id = $slider->id ;
            $slider_text->save();
        }
        session()->flash('message' , 'new Slider added successfully');
        return redirect()->route('slider.index');


//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $slider = Slider::find($id);

        return view('admin.slider.edit')->withSlider($slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request,[
            'first_text_en' => 'required|max:255',
            'first_text_ar' => 'required|max:255',
            'second_text_en' => 'required|max:255',
            'second_text_ar' => 'required|max:255',
            'third_text_en' => 'required|max:255',
            'third_text_ar' => 'required|max:255',
//            'image_cover'=> 'required|image',
        ]);

        $slider =Slider::find($id);
        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/slider/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            Image::make($dir . $fileName)->resize(1920,920)->save($dir . $fileName);
            $slider->image_url = $fileName;

        }
//        $category->status = $request->status ;

        $slider->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($slider->description as $description){

                if($description->lang_id == $language->id){
                    $description->first_text = $request->input('first_text_'.$language->label) ;
                    $description->second_text = $request->input('second_text_'.$language->label);
                    $description->third_text    = $request->input('third_text_'.$language->label);

                    $description->save();
                }
            }
        }

        session()->flash('message' , 'Slider has been updated successfully');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
