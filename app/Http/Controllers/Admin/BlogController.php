<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Blog;
use App\Models\BlogDescription;
use Image ;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = Blog::all();
        return view('admin.blog.index')->withBlogs($blog);
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

        return view('admin.blog.create')->withLanguages($languages);
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
            'name_en' => 'required|unique:blog-description,title|max:255',
            'name_ar' => 'required|unique:blog-description,title|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'author_en' => 'required|max:255',
            'author_ar' => 'required|max:255',
            'slug_en' => 'required|unique:blog-description,slug|max:255',
            'slug_ar' => 'required|unique:blog-description,slug|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        //
        $blog = new Blog();

        $dir = public_path().'/uploads/blog/cover/';
        $dir2 = public_path().'/uploads/blog/image/';
        $file = $request->file('image_cover');
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
        Image::make($dir . $fileName)->resize(760, 320)->save($dir2 . $fileName);
        $blog->image_url = $fileName;
        $blog->status = $request->status ;
        $blog->save();




        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $blogDescription = new BlogDescription();
            $blogDescription->title = $request->input('name_'.$language->label);
            $blogDescription->description = $request->input('description_'.$language->label);
            $blogDescription->meta_title = $request->input('meta_title_'.$language->label);
            $blogDescription->meta_description = $request->input('meta_description_'.$language->label);
            $blogDescription->slug = $request->input('slug_'.$language->label);
            $blogDescription->author = $request->input('author_'.$language->label);
            $blogDescription->lang_id = $language->id;
            $blogDescription->blog_id = $blog->id ;
            $blogDescription->save();
        }
        session()->flash('message' , 'new Blog added successfully');
        return redirect()->route('blog.index');
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
        $blog = Blog::find($id);

        $languages = Language::where('status','=','1')->get();


        return view('admin.blog.edit')->withLanguages($languages)->withBlog($blog);
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
            'author_en' => 'required|max:255',
            'author_ar' => 'required|max:255',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
//            'image_cover'=> 'required|image',
            'status' => 'required'
        ]);

        $blog =Blog::find($id);
        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/blog/cover/';
            $dir2 = public_path().'/uploads/blog/image/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            Image::make($dir . $fileName)->resize(570, 321)->save($dir . $fileName);
            Image::make($dir . $fileName)->resize(760, 320)->save($dir2 . $fileName);
            $blog->image_url = $fileName;

        }
        $blog->status = $request->status ;

        $blog->save();

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($blog->blogDescription as $description){

                if($description->lang_id == $language->id){
                    $description->title = $request->input('name_'.$language->label) ;
                    $description->description = $request->input('description_'.$language->label);
                    $description->slug    = $request->input('slug_'.$language->label);
                    $description->author    = $request->input('author_'.$language->label);
                    $description->meta_title = $request->input('meta_title_'.$language->label);
                    $description->meta_description = $request->input('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }

        session()->flash('message' , 'Blog has been updated successfully');
        return redirect()->route('blog.index');
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
        Blog::destroy($id);
        session()->flash('message' , 'Blog has been deleted successfully');
        return redirect()->route('blog.index');
    }
}
