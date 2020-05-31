<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Year;
use App\StudentAttendance;
use DB;
use Auth;
class StudentAttendanceController extends Controller
{
    public function addAttendance(){
    	$classes = ClassName::where(['status'=>1])->get();
    	$years = Year::where(['status'=>1])->get();
    	return view('admin.student.attendance.batch-selection-form',['classes'=>$classes,'years'=>$years]);
    }
    public function batchWiseStudentListForAttendance(Request $request){
    	$today = date('Y-m-d');
    	$checkAttendance = StudentAttendance::where([
    										'class_id'=>$request->class_id,
    										'type_id'=>$request->type_id,
    										'batch_id'=>$request->batch_id
    										])->whereDate('created_at',$today)->get();
    	if(count($checkAttendance)>0){
    		return view('admin.student.attendance.attendance-error');
    	}
    	else{
    		$students = DB::select("select students.*, schools.school_name, student_type_details.roll_no, batches.batch_name from students 
                     inner join schools on students.school_id = schools.id 
                     inner join student_type_details on student_type_details.student_id = students.id 
                     inner join batches on student_type_details.batch_id = batches.id
            where students.class_id = $request->class_id and student_type_details.type_id = $request->type_id and student_type_details.batch_id = $request->batch_id
                     ");
    		return view('admin.student.attendance.student-list-for-attendance-add',['students'=>$students]);
    	}
	}
    public function saveStudentAttendance(Request $request){
    	$today = date('Y-m-d');
    	$checkAttendance = StudentAttendance::where([
    										'class_id'=>$request->class_id,
    										'type_id'=>$request->type_id,
    										'batch_id'=>$request->batch_id
    										])->whereDate('created_at',$today)->get();
    	if(count($checkAttendance)>0){
    		return back()->with('message','Attendance Already Submitted');
    	}else{
    		$attendances = $request->attendance;
    		foreach($attendances as $studentID => $attendance){
    			$data = new StudentAttendance;
    			$data->academic_session = $request->academic_session;
    			$data->student_id = $studentID;
    			$data->class_id = $request->class_id;
    			$data->type_id = $request->type_id;
    			$data->batch_id = $request->batch_id;
    			$data->attendance = $attendance;
    			$data->user_id = Auth::user()->id;
    			$data->save();
    		}
    		return back()->with('message','Attendance Submitted Successfully');    		
    	}
    }
    public function viewAttendance(){
    	$classes = ClassName::where(['status'=>1])->get();
    	return view('admin.student.attendance.batch-selection-form-for-attendance-view',['classes'=>$classes]);
    }
    public function batchWiseStudentAttendanceView(Request $request){
    	$date = date('Y-m-d');
    	$check = StudentAttendance::where([
    		'class_id'=>$request->class_id,
    		'type_id'=>$request->type_id,
    		'batch_id'=>$request->batch_id
    		])->whereDate('created_at',$date)->get();
    	
    	if(count($check)>0){
	    	$attendances = DB::select("select student_attendances.*, students.student_name, students.sms_mobile, schools.school_name, student_type_details.roll_no from student_attendances 
	                     inner join students on student_attendances.student_id = students.id 
	                     inner join student_type_details on student_type_details.student_id = students.id 
	                     inner join schools on students.school_id = schools.id
	            where student_attendances.class_id = $request->class_id and student_attendances.type_id = $request->type_id and student_attendances.batch_id = $request->batch_id and student_type_details.type_id = $request->type_id and date_format(student_attendances.created_at,'%Y-%m-%d') = '$request->date'");
	    
	    	return view('admin.student.attendance.batch-wise-attendance',['attendances'=>$attendances]);
    	}
    	else{
    		return view('admin.student.attendance.alert',['message'=>'Not Yet Submitted...']);	
    	}
    }
    public function editAttendance(){
    	$classes = ClassName::where(['status'=>1])->get();
    	return view('admin.student.attendance.batch-selection-form-for-attendance-edit',['classes'=>$classes]);
    }
    public function studentListForAttendanceEdit(Request $request){
    	$date = date('Y-m-d');
    	$check = StudentAttendance::where([
    		'class_id'=>$request->class_id,
    		'type_id'=>$request->type_id,
    		'batch_id'=>$request->batch_id
    		])->whereDate('created_at',$date)->get();

    	if(count($check)>0){
			$attendances = DB::select("select student_attendances.*, students.student_name, students.sms_mobile, schools.school_name, student_type_details.roll_no from student_attendances 
		                 inner join students on student_attendances.student_id = students.id 
		                 inner join student_type_details on student_type_details.student_id = students.id 
		                 inner join schools on students.school_id = schools.id
		        where student_attendances.class_id = $request->class_id and student_attendances.type_id = $request->type_id and student_attendances.batch_id = $request->batch_id and student_type_details.type_id = $request->type_id and date_format(student_attendances.created_at,'%Y-%m-%d') = '$date'");
			return view('admin.student.attendance.attendance-update-form',['attendances'=>$attendances]);
    	}
    	else{
    		return view('admin.student.attendance.alert',['message'=>'Attendance does not Submitted yet...']);	
    	}
    }
    public function studentAttendanceUpdate(Request $request){
    	
    	$attendances = $request->attendance;
    	foreach($attendances as $id=>$attendance){
    		$data = StudentAttendance::find($id);
    		$data->attendance = $attendance;
    		$data->save();
    	}
    	return back()->with('message','Attendance Updated Successfully');
    }
}
