<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Image;
class SliderController extends Controller
{
    public function addSlide(){
    	return view('admin.slider.slide-add-form');
    }
    public function uploadSlide(Request $request){
		$this->validate($request,[
						'slide_image'=>'required',
						'slide_title'=>'required',
						'slide_description'=>'required',
						'status'=>'required'
		]);
		$data = new Slide;
		$data->slide_image = $this->createSlide($request);
		$data->slide_title = $request->slide_title;
		$data->slide_description = $request->slide_description;
		$data->status = $request->status;
		$data->save();

		return back()->with('message','New Slide Added Succussfully');
    }
    public function createSlide($request){
    	$slide_image = mt_rand().$request->slide_image->getClientOriginalName();
        Image::make($request->slide_image)->resize(1400,570)->save("admin/assets/slider/$slide_image");
        return $slide_image;
    }
    public function manageSlide(){
    	$slides = Slide::all();
    	return view('admin.slider.manage-slide',['slides'=>$slides]);
    }
    public function slideUnpublished($id){
    	$data = Slide::find($id);
    	$data->status = 2;
    	$data->save();
    	return back()->with('message','Operation Succussfully Done');
    }
    public function slidePublished($id){
    	$data = Slide::find($id);
    	$data->status = 1;
    	$data->save();
    	return back()->with('message','Operation Succussfully Done');
    }
    public function photoGallery(){
    	$slides = Slide::all();
    	return view('admin.slider.photo-gallery',['slides'=>$slides]);
    }
    public function slideEdit($id){
    	$slide = Slide::find($id);
    	return view('admin.slider.slide-edit-form',['slide'=>$slide]);
    }
    public function updateSlide(Request $request){
    	$data = Slide::find($request->id);
    	$data->slide_title = $request->slide_title;
		$data->slide_description = $request->slide_description;
		$data->status = $request->status;
    	
    	if(isset($request->slide_image)){
	    	 if(file_exists("admin/assets/slider/".$data->slide_image)){
	    	 	unlink("admin/assets/slider/".$data->slide_image);
	    	 }
    	 $data->slide_image = $this->createSlide($request);
    	}
		$data->save();
    		
		return redirect('/manage-slide')->with('message','Slide Updated Succussfully');	
    	
    }
}
