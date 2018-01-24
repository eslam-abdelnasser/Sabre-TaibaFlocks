<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Option ;
use App\Models\OptionDescription;
use App\Models\Language;
class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $options = Option::all();

        return view('admin.options.index')->withOptions($options);
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
        return view('admin.options.create')->withLanguages($languages);
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
            'price'      => 'required|integer',
            'status' => 'required'
        ]);


        $option = new Option();
        $option->status = $request->status ;
        $option->price = $request->price;
        $option->save();

        $languages = Language::where('status' , '=' , '1')->get();
        foreach ($languages as $language){
            $optionDescription = new OptionDescription();
            $optionDescription->name = $request->input('name_'.$language->label);
            $optionDescription->description = $request->input('description_'.$language->label);
            $optionDescription->lang_id = $language->id;
            $optionDescription->option_id = $option->id ;
            $optionDescription->save();
        }
        session()->flash('message' , 'new Option added successfully');
        return redirect()->route('options.index');
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
        $option = Option::find($id);
        return view('admin.options.edit')->withLanguages($languages)->withOption($option);
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
            'price' => 'required|integer',
            'status' => 'required'
        ]);

        $option =Option::find($id);
        $option->price = $request->price ;
        $option->status = $request->status ;

        $option->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($option->optionDescription as $description){

                if($description->lang_id == $language->id){
                    $description->name = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'option has been updated successfully');
        return redirect()->route('options.index');
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
        Option::destroy($id);
        session()->flash('message' , 'Option has been deleted successfully');
        return redirect()->route('options.index');
    }
}
