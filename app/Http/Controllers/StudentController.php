<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\ClassName;
use App\StudentType;
use App\Batch;
class StudentController extends Controller
{
    public function studentRegistrationForm(){
    	$schools = School::where('status',1)->get();
    	$classes = ClassName::where('status',1)->get();
    	return view('admin.student.registration.registration-form',['schools'=>$schools,'classes'=>$classes]);
    }
    public function bringStudentType(Request $request){
    	 $types = StudentType::where(['class_id'=>$request->class_id])->get();
    	 $classes = ClassName::where('status',1)->get();
    	 return view('admin.student.registration.student-types',[
    	 			'types'=>$types,'classes'=>$classes,'data'=>$request]);
    }
    public function batchRollForm(Request $request){
    	$batches = Batch::where(['class_id'=>$request->class_id,'student_type_id'=>$request->type_id])->get();
    	$type = StudentType::find($request->type_id); 	
    	return view('admin.student.registration.batch-roll-form',['batches'=>$batches,'type'=>$type]);
    }
}
