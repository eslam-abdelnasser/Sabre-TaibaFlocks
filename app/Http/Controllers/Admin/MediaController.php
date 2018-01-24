<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery ; 
use App\Models\GalleryVedio ; 
use App\Models\GalleryImage ; 
use Image ; 
use Storage; 
use File;
use Input ; 
/**
 * Media Controller  
 * 2 types of galleries : 
 * 	1- Image Gallery 
 * 	2- Vedio Gallery  
 */
class MediaController extends Controller
{
    /**
     * list all galleries
     * @return [type] [description]
     */
    public function index(){
    	$media = Gallery::all(); 
    	return view('admin.media.index')->withMedia($media); 
    }
    /**
     * create new gallery  image gallery - vedio gallery 
     * @return [type] [description]
     */
    public function  galleryCreate(){
    	 
    	return view('admin.media.gallery_create'); 
    }
    /**
     * Creaft the new gallery 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function galleryPost(Request $request){


        $rules = [
            'title'=>'required' , 
            'status'=>'required'

        ]; 

        $this->validate($request , $rules); 

          
    	$gallery = new Gallery ; 
        $gallery->title = $request->title ; 
    	 
    	$gallery->status = $request->status ;  
    	$gallery->save(); 

        session()->flash('message','New Gallery has been added successfully');
    	return redirect()->route('admin.media'); 
    }

    /**
     * Edit current gallery edit on title and status -- he cant update type  
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function editGallery($id){

    	$gallery = Gallery::find($id); 
    	return view('admin.media.gallery_edit')->withGallery($gallery); 
    }
    /**
     * post updates to current gallery
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function updateGallery(Request $request , $id){

         $rules = [
            'title'=>'required' , 
             

        ]; 

        $this->validate($request , $rules); 
    	$gallery = Gallery::find($id) ; 
        $gallery->title = $request->title ; 
  
        $gallery->status = $request->status ;

    	 

    	$gallery->save() ; 

        session()->flash('message','Gallery has been updated successfully');

    	return redirect()->route('admin.media') ; 

    }



    /**
     * get attach view seperated on two section attach vedio url or attach images  
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getAttach($id){
    	$gallery = Gallery::find($id) ; 
    	return view('admin.media.attach')->withGallery($gallery); 
    }
    

    /**
     * attach images to gallery  -- > relation gallery has many images 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function attachImages(Request $request){
    	  	// $dir = public_path().'/uploads/gallery_images/'; 
        	$g_id = $request->input('gallery_id');
        	$gallery = Gallery::find($g_id); 
         
        	if($request->hasFile('file')){
        		$files = $request->file('file'); 
        		foreach ($files as $file) {
        			
        			$fileName =  str_random(6).'.'.$file->getClientOriginalExtension(); 


//                    Image::make($file)->resize(80,65)->save(public_path('uploads/gallery_images/thumbs-80/'.$fileName));
//                    Image::make($file)->resize(186,113)->save(public_path('uploads/gallery_images/thumbs-186/'.$fileName));
//                    Image::make($file)->resize(251,221)->save(public_path('uploads/gallery_images/thumbs-251/'.$fileName));
//                    Image::make($file)->resize(262,200)->save(public_path('uploads/gallery_images/thumbs-262/'.$fileName));
//                    Image::make($file)->resize(500,336)->save(public_path('uploads/gallery_images/thumbs-500/'.$fileName));
//                    Image::make($file)->resize(750,300)->save(public_path('uploads/gallery_images/thumbs-750/'.$fileName));

                    Image::make($file)->resize(500,137)->save(public_path('uploads/gallery_images/thumbs-500-137/'.$fileName));
                    Image::make($file)->resize(400,200)->save(public_path('uploads/gallery_images/thumbs-400-200/'.$fileName));
			        // $file->move($dir , $fileName);
                    
			            
			        $image = new GalleryImage(); 
			        $image->gallery_id =  $g_id ; 
			        $image->image_url = $fileName ; 
			         
			         
			        $image->save(); 

                    session()->flash('message','Images have been attached to gallery successfully');
        		}
        	}

	        
	      
    	  
    }

    /**
     * Display all images under certain gallery 
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getGalleryImages($id){

    	$gallery = Gallery::find($id) ; 

    	$images = $gallery->images ; 

    	return view('admin.media.show_images')->withImages($images); 
    }
    /**
     * Delete image under certain gallery 
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroyImage($id){

    	$image = GalleryImage::find($id); 
    	$old_file_name = $image->image_url ; 
        $original  = public_path('uploads/gallery_images/'.$old_file_name); 
//        $thumbs_80 = public_path('uploads/gallery_images/thumbs-80/'.$old_file_name);
//        $thumbs_186 = public_path('uploads/gallery_images/thumbs-186/'.$old_file_name);
//        $thumbs_251 = public_path('uploads/gallery_images/thumbs-251/'.$old_file_name);
//        $thumbs_262 = public_path('uploads/gallery_images/thumbs-262/'.$old_file_name);
//        $thumbs_500 = public_path('uploads/gallery_images/thumbs-500/'.$old_file_name);
//    	$thumbs_750 = public_path('uploads/gallery_images/thumbs-750/'.$old_file_name);


        File::delete($original); 
//        File::delete($thumbs_80);
//        File::delete($thumbs_186);
//        File::delete($thumbs_251);
//        File::delete($thumbs_262);
//        File::delete($thumbs_500);
//        File::delete($thumbs_750);
            File::delete('uploads/gallery_images/thumbs-400-200/'.$old_file_name);
            File::delete('uploads/gallery_images/thumbs-500-137/'.$old_file_name);
            $image->delete();

        session()->flash('message','Image was deleted successfully');
        return back();   
    }

    
}
