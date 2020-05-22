<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
class ClassManagementController extends Controller
{
     public function addClassForm(){
    	return view('admin.settings.class.add-form');
     }
     public function saveClass(Request $request){
     	$this->validate($request,['class_name'=>'required|string']);
     
     	$data = new ClassName;
     	$data->class_name = $request->class_name;
     	$data->status = 1;
     	$data->save();

     	return back()->with('message','Operation Successfully done');
     }
     public function classList(){
     	$classes = ClassName::all();
     	return view('admin.settings.class.list',['classes'=>$classes]);
     }
}
