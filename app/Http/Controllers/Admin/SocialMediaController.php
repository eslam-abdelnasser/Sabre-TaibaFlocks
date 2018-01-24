<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia ; 

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = SocialMedia::all(); 
        return view ('admin.social.index')->withSocial($social); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
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

            'name'=>'required', 
            'url'=>'required', 
            'icon'=>'required'


        ]; 

        $this->validate($request , $rules); 



        $social  = new SocialMedia ;
        $social->name = $request->name ; 
        $social->url = $request->url ; 
        $social->icon = $request->icon ; 
        $social->is_active = $request->is_active  ;

        $social->save(); 

        return redirect()->route('social.index') ; 

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
        $link = SocialMedia::find($id); 

        return view('admin.social.edit')->withLink($link); 
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

            'name'=>'required', 
            'url'=>'required', 
            'icon'=>'required'


        ]; 

        $this->validate($request , $rules); 

        $link = SocialMedia::find($id); 

        $link->name = $request->name ;  
        $link->url = $request->url ;  
        $link->icon = $request->icon ;  
        $link->is_active = $request->is_active ;

        $link->save(); 

        return redirect()->route('social.index');   
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
