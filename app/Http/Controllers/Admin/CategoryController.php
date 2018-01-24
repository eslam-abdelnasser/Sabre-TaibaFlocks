<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\Category;
use App\Models\CategoryDescription;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index')->withCategories($categories);
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

        return view('admin.categories.create')->withLanguages($languages);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required|unique:category-description,name|max:255',
            'name_ar' => 'required|unique:category-description,name|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'slug_en' => 'required|unique:category-description,slug|max:255',
            'slug_ar' => 'required|unique:category-description,slug|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        //
        $category = new Category();

            $dir = public_path().'/uploads/category/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);

            $category->image_url = $fileName;
            $category->status = $request->status ;
            $category->save();




        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $categoryDescription = new CategoryDescription();
            $categoryDescription->name = $request->input('name_'.$language->label);
            $categoryDescription->description = $request->input('description_'.$language->label);
            $categoryDescription->meta_title = $request->input('meta_title_'.$language->label);
            $categoryDescription->meta_description = $request->input('meta_description_'.$language->label);
            $categoryDescription->slug = $request->input('slug_'.$language->label);
            $categoryDescription->lang_id = $language->id;
            $categoryDescription->category_id = $category->id ;
            $categoryDescription->save();
        }
        session()->flash('message' , 'new category added successfully');
        return redirect()->route('categories.index');

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
        $category = Category::find($id);

        $languages = Language::where('status','=','1')->get();


        return view('admin.categories.edit')->withLanguages($languages)->withCategory($category);

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

        $category =Category::find($id);
        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/category/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $category->image_url = $fileName;

        }
        $category->status = $request->status ;

        $category->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($category->categoryDescription as $description){

                if($description->lang_id == $language->id){
                    $description->name = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->slug    = $request->input('slug_'.$language->label);
                    $description->meta_title = $request->input('meta_title_'.$language->label);
                    $description->meta_description = $request->input('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'Category has been updated successfully');
        return redirect()->route('categories.index');
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

        Category::destroy($id);
        session()->flash('message' , 'Category has been deleted successfully');
        return redirect()->route('categories.index');
    }
}
