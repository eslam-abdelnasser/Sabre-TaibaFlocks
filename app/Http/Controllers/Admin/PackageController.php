<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageDescription;
use App\Models\Category;
use App\Models\Option;
use App\Models\Feature;
use Image;
use App\User;
use App\Models\GeneralSetting ;
use App\Models\Review ;
use Auth ;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $data = '06/16/2017 12:00 AM';
//            $outdata =  date('Y-m-d H:i:s', strtotime($data));
//            dd($outdata);


        $packages = Package::all();
         return view('admin.packages.index')->withPackages($packages);
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
        $categories = Category::where('status','=','1')->get();
        $options = Option::where('status','=','1')->get();
        $features = Feature::where('status','=','1')->get();
        return view('admin.packages.create')->withLanguages($languages)->withCategories($categories)->withFeatures($features)->withOptions($options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation

        $this->validate($request,[
            'name_en' => 'required|unique:package-description,name|max:255',
            'name_ar' => 'required|unique:package-description,name|max:255',
            'slug_en' => 'required|unique:package-description,slug|max:255',
            'slug_ar' => 'required|unique:package-description,slug|max:255',
            'destination_en' => 'required|unique:package-description,destination|max:255',
            'destination_ar' => 'required|unique:package-description,destination|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
            'image_cover'=> 'required|image',
            'status' => 'required',
            'points' => 'required',
            'min_number' => 'required_with:max_number',
            'max_number' => 'required_with:min_number|greater_than_field:min_number',
            'reservation' =>'required',
            'journey' =>'required',
            'cancellation_date' => 'required',
            'category' => 'required',
            'user_group' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        // separate start  and end date for reservation and journey
        $reservation = explode('-',$request->reservation);
        $journey = explode('-' , $request->journey);


        //save new package
        $package = new Package();
        $package->status = $request->status ;
        $package->reservation_start_date =date('Y-m-d H:i:s', strtotime($reservation[0]));
        $package->reservation_end_date = date('Y-m-d H:i:s', strtotime($reservation[1]));
        $package->journey_start_date = date('Y-m-d H:i:s', strtotime( $journey[0]));
        $package->journey_end_date = date('Y-m-d H:i:s', strtotime( $journey[1]));
        $package->cancellation_date =  date('Y-m-d H:i:s', strtotime($request->cancellation_date));
        $package->max_number =  $request->max_number ;
        $package->min_number = $request->min_number ;
        $package->points = $request->points;
        $package->user_group_id = $request->user_group ;
        $package->category_id  = $request->category ;
        $package->price  = $request->price ;
        // upload and save image
        $dir = public_path().'/uploads/packages/';
        $file = $request->file('image_cover');
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $package->image_url = $fileName;
        $package->save();
        Image::make($dir . $fileName)->resize(370, 187)->save($dir .'cover/'. $fileName);
        Image::make($dir . $fileName)->resize(270, 137)->save($dir .'cheapest/'. $fileName);
        Image::make($dir . $fileName)->resize(150, 150)->save($dir .'latest/'. $fileName);
        $package->features()->attach($request->features);
        $package->options()->attach($request->options);


        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            $packageDescription = new PackageDescription();
            $packageDescription->name = $request->input('name_'.$language->label);
            $packageDescription->description = $request->input('description_'.$language->label);
            $packageDescription->meta_title = $request->input('meta_title_'.$language->label);
            $packageDescription->meta_description = $request->input('meta_description_'.$language->label);
            $packageDescription->destination = $request->input('destination_'.$language->label);
            $packageDescription->slug = $request->input('slug_'.$language->label);
            $packageDescription->lang_id = $language->id;
            $packageDescription->package_id = $package->id ;
            $packageDescription->save();
        }
        session()->flash('message' , 'new package added successfully');
        return redirect()->route('packages.index');

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
        $package = Package::find($id);
        $languages = Language::where('status','=','1')->get();
        $categories = Category::where('status' , '=','1')->get();
        $features = Feature::where('status' , '=','1')->get();
        $options = Option::where('status' , '=','1')->get();
        return view('admin.packages.edit')->withPackage($package)->withLanguages($languages)->withCategories($categories)->withOptions($options)->withFeatures($features);

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
        //validation

        $this->validate($request,[
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'slug_en' => 'required|max:255',
            'slug_ar' => 'required|max:255',
            'destination_en' => 'required|max:255',
            'destination_ar' => 'required|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'meta_title_en'=> 'required|max:255',
            'meta_title_ar'=> 'required|max:255',
//            'image_cover'=> 'required|image',
            'status' => 'required',
            'points' => 'required',
            'min_number' => 'required_with:max_number',
            'max_number' => 'required_with:min_number|greater_than_field:min_number',
            'reservation' =>'required',
            'journey' =>'required',
            'cancellation_date' => 'required',
            'category' => 'required',
            'user_group' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        // separate start  and end date for reservation and journey
        $reservation = explode('-',$request->reservation);
        $journey = explode('-' , $request->journey);


        //save new package
        $package = Package::find($id);
        $package->status = $request->status ;
        $package->reservation_start_date =date('Y-m-d H:i:s', strtotime($reservation[0]));
        $package->reservation_end_date = date('Y-m-d H:i:s', strtotime($reservation[1]));
        $package->journey_start_date = date('Y-m-d H:i:s', strtotime( $journey[0]));
        $package->journey_end_date = date('Y-m-d H:i:s', strtotime( $journey[1]));
        $package->cancellation_date =  date('Y-m-d H:i:s', strtotime($request->cancellation_date));
        $package->max_number =  $request->max_number ;
        $package->min_number = $request->min_number ;
        $package->points = $request->points;
        $package->user_group_id = $request->user_group ;
        $package->category_id  = $request->category ;
        $package->price = $request->price ;
        // upload and save image

        if ($request->hasFile('image_cover')) {

            $dir = public_path().'/uploads/packages/';
            $file = $request->file('image_cover');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $package->image_url = $fileName;
            Image::make($dir . $fileName)->resize(370, 187)->save($dir .'cover/'. $fileName);
            Image::make($dir . $fileName)->resize(270, 137)->save($dir .'cheapest/'. $fileName);
            Image::make($dir . $fileName)->resize(150, 150)->save($dir .'latest/'. $fileName);
        }

        $package->save();

        $package->features()->sync($request->features);
        $package->options()->sync($request->options);


        $languages = Language::where('status','=','1')->get();

        foreach ($languages as $language){
            foreach($package->packageDescription as $description) {

                if ($description->lang_id == $language->id) {

                    $description->name = $request->input('name_' . $language->label);
                    $description->description = $request->input('description_' . $language->label);
                    $description->meta_title = $request->input('meta_title_' . $language->label);
                    $description->meta_description = $request->input('meta_description_' . $language->label);
                    $description->destination = $request->input('destination_' . $language->label);
                    $description->slug = $request->input('slug_' . $language->label);
                    $description->lang_id = $language->id;
                    $description->package_id = $package->id;
                    $description->save();
                }
            }
        }
        session()->flash('message' , 'new package updated successfully');
        return redirect()->route('packages.index');
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

        Package::destroy($id);
        session()->flash('message' , 'Package has been deleted successfully');
        return redirect()->route('packages.index');
    }

    public function showReviews($id){



        $review = Review::where('package_id','=',$id)->get();
         return view('admin.packages.reviews.index')->withReviews($review);
    }


    public  function editReview($id){


        $review = Review::find($id);

        return view('admin.packages.reviews.show')->withReview($review);
    }

    public function updateReview(Request $request ,$id){
        $review =  Review::find($id);
        $user =  User::where('email','=',trim($review->email));
        $user->update([
            'points' => GeneralSetting::all()->first()->review_points + $user->get()->first()->points
        ]);
        $review->status = $request->status ;
        $review->save();


        session()->flash('message','Review updated successfully');
        return redirect()->route('show.reviews',['id'=> $review->package_id]);
    }
}
