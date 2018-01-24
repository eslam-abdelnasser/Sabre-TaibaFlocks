<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisment ; 
use App\Models\Gallery ; 

class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisments = Advertisment::all(); 

        $first_adv = Advertisment::where(['position'=>'first'])->first(); 
        $second_adv = Advertisment::where(['position'=>'second'])->first(); 
        $third_adv = Advertisment::where(['position'=>'third'])->first(); 
        $fourth_adv = Advertisment::where(['position'=>'fourth'])->first(); 



        return view('admin.advertisment.index')->withAdvertisments($advertisments)->withFirstAdv($first_adv)->withSecondAdv($second_adv)->withThirdAdv($third_adv)->withFourthAdv($fourth_adv); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $position = $request->get('position'); 

         
        $galleries = Gallery::where(['status'=>1])->get(); 
        return view('admin.advertisment.create')->withPosition($position)->withGalleries($galleries); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [


            'title'=>'required', 
            'gallery'=>'required' 
      

        ]; 

        $this->validate($request , $rules ) ; 

        $advertisment = new Advertisment ; 

        $advertisment->title = $request->title ; 
        $advertisment->gallery_id = $request->gallery ; 
        $advertisment->url = $request->url ; 
        $advertisment->position = $request->advertisment_position ; 
        $advertisment->status = $request->status ; 


        $advertisment->save();

        session()->flash('message','Area Has been Booked And Loaded With Advertisment Successfully');

        return redirect()->route('advertisment.index');  

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
    public function edit(Request $request , $id)
    {

        $position = $request->get('position'); 

          
        $advertisment = Advertisment::find($id); 

        $galleries = Gallery::where(['status'=>1 ])->get(); 

        return view('admin.advertisment.edit')->withAdvertisment($advertisment)->withPosition($position)->withGalleries($galleries); 
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
        
         $rules = [


            'title'=>'required', 
            'gallery'=>'required' 
      

        ]; 

        $this->validate($request , $rules ) ; 

        $advertisment = Advertisment::find($id) ; 

        $advertisment->title = $request->title ; 
        $advertisment->gallery_id = $request->gallery ; 
        $advertisment->url = $request->url ; 
        $advertisment->position = $request->advertisment_position ; 
        $advertisment->status = $request->status ; 
        
        $advertisment->save(); 

        session()->flash('message','Area Information has been updated successfully'); 

        return redirect()->route('advertisment.index') ; 
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
