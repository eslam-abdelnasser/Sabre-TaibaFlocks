<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Feature;
use App\Models\FeatureDescription;
class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $features = Feature::all();

        return view('admin.features.index')->withFeatures($features);
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

        return view('admin.features.create')->withLanguages($languages);
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
            'name_en' => 'required|unique:feature-description,name|max:255',
            'name_ar' => 'required|unique:feature-description,name|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'status' => 'required'
        ]);


        $feature = new Feature();
        $feature->status = $request->status ;
        $feature->save();

        $languages = Language::where('status' , '=' , '1')->get();
        foreach ($languages as $language){
            $featureDescription = new FeatureDescription();
            $featureDescription->name = $request->input('name_'.$language->label);
            $featureDescription->description = $request->input('description_'.$language->label);
            $featureDescription->lang_id = $language->id;
            $featureDescription->feature_id = $feature->id ;
            $featureDescription->save();
        }
        session()->flash('message' , 'new Feature added successfully');
        return redirect()->route('features.index');
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
        $languages = Language::where('status','=','1')->get();
        $feature = Feature::find($id);
        return view('admin.features.edit')->withLanguages($languages)->withFeature($feature);
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
            'status' => 'required'
        ]);

        $feature =Feature::find($id);

        $feature->status = $request->status ;

        $feature->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($feature->featureDescription as $description){

                if($description->lang_id == $language->id){
                    $description->name = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'feature has been updated successfully');
        return redirect()->route('features.index');
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
        Feature::destroy($id);
        session()->flash('message' , 'Feature has been deleted successfully');
        return redirect()->route('features.index');
    }
}
