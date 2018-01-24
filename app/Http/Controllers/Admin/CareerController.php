<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Career;
use App\Models\CareerDescription;
use Image ;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $career = Career::all();
        return view('admin.careers.index')->withCareers($career);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status', '=' ,'1')->get();

        return view('admin.careers.create')->withLanguages($languages);
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
        //
        $this->validate($request,[
            'name_en' => 'required|unique:career-description,title|max:255',
            'name_ar' => 'required|unique:career-description,title|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',

            'slug_en' => 'required|unique:career-description,slug|max:255',
            'slug_ar' => 'required|unique:career-description,slug|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        //
        $career = new Career();

        $dir = public_path().'/uploads/career/cover/';
        $file = $request->file('image_cover');
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
        $career->image_url = $fileName;
        $career->status = $request->status ;
        $career->save();




        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $careerDescription = new CareerDescription();
            $careerDescription->title = $request->input('name_'.$language->label);
            $careerDescription->description = $request->input('description_'.$language->label);
            $careerDescription->meta_title = $request->input('meta_title_'.$language->label);
            $careerDescription->meta_description = $request->input('meta_description_'.$language->label);
            $careerDescription->slug = $request->input('slug_'.$language->label);
            $careerDescription->lang_id = $language->id;
            $careerDescription->career_id = $career->id ;
            $careerDescription->save();
        }
        session()->flash('message' , 'new Career added successfully');
        return redirect()->route('careers.index');
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
        $career = Career::find($id);

        $languages = Language::where('status','=','1')->get();


        return view('admin.careers.edit')->withLanguages($languages)->withCareer($career);
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
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'slug_en' => 'required|max:255',
            'slug_ar' => 'required|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
//            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        $career = Career::find($id);
        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/career/cover/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
            $career->image_url = $fileName;

        }
        $career->status = $request->status ;

        $career->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($career->Description as $description){

                if($description->lang_id == $language->id){
                    $description->title = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->slug    = $request->input('slug_'.$language->label);
                    $description->meta_title = $request->input('meta_title_'.$language->label);
                    $description->meta_description = $request->input('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'Career has been updated successfully');
        return redirect()->route('careers.index');
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
