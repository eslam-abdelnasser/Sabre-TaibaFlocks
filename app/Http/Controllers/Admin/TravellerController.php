<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\TravellerHistory ;
use App\Models\TravellerHistoryDescription;
use Image ;
class TravellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $traveller = TravellerHistory::all();
        return view('admin.traveller.index')->withTravellers($traveller);
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

        return view('admin.traveller.create')->withLanguages($languages);
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
            'name_en' => 'required|unique:traveller-description,title|max:255',
            'name_ar' => 'required|unique:traveller-description,title|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'traveller_en' => 'required|max:255',
            'traveller_ar' => 'required|max:255',
            'slug_en' => 'required|unique:traveller-description,slug|max:255',
            'slug_ar' => 'required|unique:traveller-description,slug|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        //
        $traveller = new TravellerHistory();

        $dir = public_path().'/uploads/traveller/cover/';
        $dir2 = public_path().'/uploads/traveller/image/';
        $file = $request->file('image_cover');
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
        Image::make($dir . $fileName)->resize(760, 320)->save($dir2 . $fileName);
        $traveller->image_url = $fileName;
        $traveller->status = $request->status ;
        $traveller->save();




        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $travellerDescription = new TravellerHistoryDescription();
            $travellerDescription->title = $request->input('name_'.$language->label);
            $travellerDescription->description = $request->input('description_'.$language->label);
            $travellerDescription->meta_title = $request->input('meta_title_'.$language->label);
            $travellerDescription->meta_description = $request->input('meta_description_'.$language->label);
            $travellerDescription->slug = $request->input('slug_'.$language->label);
            $travellerDescription->author = $request->input('traveller_'.$language->label);
            $travellerDescription->lang_id = $language->id;
            $travellerDescription->traveller_history_id = $traveller->id ;
            $travellerDescription->save();
        }
        session()->flash('message' , 'new Traveller History added successfully');
        return redirect()->route('traveller.index');
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
        $traveller = TravellerHistory::find($id);

        $languages = Language::where('status','=','1')->get();


        return view('admin.traveller.edit')->withLanguages($languages)->withTraveller($traveller);
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
            'traveller_en' => 'required|max:255',
            'traveller_ar' => 'required|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
//            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        $traveller =TravellerHistory::find($id);
        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/traveller/cover/';
            $dir2 = public_path().'/uploads/traveller/image/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
            Image::make($dir . $fileName)->resize(760, 320)->save($dir2 . $fileName);
            $traveller->image_url = $fileName;

        }
        $traveller->status = $request->status ;

        $traveller->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($traveller->travellerDescription as $description){

                if($description->lang_id == $language->id){
                    $description->title = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->slug    = $request->input('slug_'.$language->label);
                    $description->author    = $request->input('traveller_'.$language->label);
                    $description->meta_title = $request->input('meta_title_'.$language->label);
                    $description->meta_description = $request->input('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'Traveller History has been updated successfully');
        return redirect()->route('traveller.index');
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

        TravellerHistory::destroy($id);
        session()->flash('message' , 'Traveller history has been deleted successfully');
        return redirect()->route('traveller.index');
    }
}
