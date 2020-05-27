<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\School;
use App\ClassName;
use App\StudentType;
use App\Batch;
use App\Student;
use App\StudentTypeDetail;
use Auth;
use DB;
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
    public function studentSave(Request $request){
    	$student = new Student;
    	$student->student_name = $request->student_name;
    	$student->school_id = $request->school_id;
    	$student->class_id = $request->class_id;
    	$student->father_name = $request->father_name;
    	$student->father_mobile = $request->father_mobile;
    	$student->father_profession = $request->father_profession;
    	$student->mother_name = $request->mother_name;
    	$student->mother_mobile = $request->mother_mobile;
    	$student->mother_profession = $request->mother_profession;
    	$student->email_address = $request->email_address;
    	$student->sms_mobile = $request->sms_mobile;
    	$student->date_of_admission = $request->date_of_admission;
    //	$student->student_photo = $request->student_photo;
    	$student->address = $request->address;
    	$student->status = 1;
    	$student->password = $request->sms_mobile;
    	$student->encrypted_password = Hash::make($request->sms_mobile);
    	$student->user_id = Auth::user()->id;
    	$student->save();

    	$studentId = $student->id;
    	$rolls = $request->roll;
        $batches = $request->batch_id;
    	$studentTypes = $request->student_type;

    	foreach($studentTypes as $key => $studentType){
    		$data = new StudentTypeDetail;
    		$data->student_id = $studentId;
    		$data->class_id = $request->class_id;
    		$data->type_id = $key;
    		$data->batch_id = $batches[$key];
    		$data->roll_no = $rolls[$key];
    		$data->type_status = 1;
    		$data->save();
    	}
    	return back()->with('message','Registration done');
    }
    public function allRunningStudentList(){
        $students = DB::select('select students.*,schools.school_name,class_names.class_name from students 
                    inner join schools on students.school_id = schools.id
                    inner join class_names on students.class_id= class_names.id'
                );
        return view('admin.student.all-running-student',['students'=>$students]);
    }
    public function classSelectionForm(){
        $classes = ClassName::all();
        return view('admin.student.class.class-selection-form',['classes'=>$classes]);
    }
    public function classAndTypeWiseStudent(Request $request){
        $students = DB::select("select students.*, schools.school_name, student_type_details.roll_no, batches.batch_name from students 
                     inner join schools on students.school_id = schools.id 
                     inner join student_type_details on student_type_details.student_id = students.id 
                     inner join batches on student_type_details.batch_id = batches.id
            where student_type_details.type_id = $request->type_id
                     ");
        return view('admin.student.class.student-list',['students'=>$students]);
    }
    public function studentDetails($id){
        $student = DB::select("select students.*, schools.school_name, student_type_details.roll_no, batches.batch_name, class_names.class_name, student_types.student_type from students 
                     inner join class_names on students.class_id = class_names.id
                     inner join schools on students.school_id = schools.id 
                     inner join student_type_details on student_type_details.student_id = students.id 
                     inner join student_types on student_type_details.type_id = student_types.id
                     inner join batches on student_type_details.batch_id = batches.id
            where students.id = $id
                     ");
        return view('admin.student.details.profile',['student'=>$student]);
    }
    public function batchSelectionForm(){
        $classes = ClassName::all();
        return view('admin.student.batch.batch-selection-form',['classes'=>$classes]);
    }
    public function courseWiseBatch(Request $request){
        $batches = Batch::where(['student_type_id'=>$request->type_id])->get();
        return view('admin.student.batch.course-wise-batch',['batches'=>$batches]);
    }
    public function batchWiseStudentList(Request $request){
        $students = DB::select("select students.*, schools.school_name, student_type_details.roll_no, batches.batch_name from students 
                     inner join schools on students.school_id = schools.id 
                     inner join student_type_details on student_type_details.student_id = students.id 
                     inner join batches on student_type_details.batch_id = batches.id
            where students.class_id = $request->class_id and student_type_details.type_id = $request->type_id and student_type_details.batch_id = $request->batch_id
                     ");
        return view('admin.student.batch.student-list',['students'=>$students]);

    }
}
