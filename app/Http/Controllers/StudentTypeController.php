<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ClassName;
use App\StudentType;
class StudentTypeController extends Controller
{
    public function index(){
    	$student_types = DB::table('student_types')
    					->join('class_names','student_types.class_id','=','class_names.id')
    					->select('student_types.*','class_names.class_name')
    					->get();
    	$classes = ClassName::all();
    	return view('admin.settings.student-type.student-type-list',['student_types'=>$student_types,'classes'=>$classes]);
    	
    }
    public function studentTypeAdd(Request $request){

    	$value = new StudentType;
    	$value->class_id = $request->classId;
    	$value->student_type = $request->StudentType;
    	$value->status = 1;
    	$value->save();
        echo json_encode(['message'=>'Data Inserted Successfully']);
    }
}
