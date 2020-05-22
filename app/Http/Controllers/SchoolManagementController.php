<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
class SchoolManagementController extends Controller
{
    public function addSchoolForm(){
    	return view('admin.settings.school.add-form');
    }
    public function schoolSave(Request $request){
    	$this->validate($request,[
    				'school_name'=>'required|string'
    	]);

    	$data = new School;
    	$data->school_name = $request->school_name;
    	$data->status = 1;
    	$data->save();
    	return back()->with('message','School Added Successfully');
    }
    public function SchoolList(){
    	$schools = School::all();
    	return view('admin.settings.school.list',['schools'=>$schools]);
    }
}
