<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Year;
use DB;

class StudentAttendanceController extends Controller
{
    public function addAttendance(){
    	$classes = ClassName::where(['status'=>1])->get();
    	$years = Year::where(['status'=>1])->get();
    	return view('admin.student.attendance.batch-selection-form',['classes'=>$classes,'years'=>$years]);
    }
    public function batchWiseStudentListForAttendance(Request $request){
    	$students = DB::select("select students.*, schools.school_name, student_type_details.roll_no, batches.batch_name from students 
                     inner join schools on students.school_id = schools.id 
                     inner join student_type_details on student_type_details.student_id = students.id 
                     inner join batches on student_type_details.batch_id = batches.id
            where students.class_id = $request->class_id and student_type_details.type_id = $request->type_id and student_type_details.batch_id = $request->batch_id
                     ");
    	return view('admin.student.attendance.student-list-for-attendance-add',['students'=>$students]);
    }
    public function saveStudentAttendance(Request $request){
    	dd($request->all());
    }
}
