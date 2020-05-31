<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Exam;

class ExamManagementController extends Controller
{
    public function addExamForm(){
    	$classes = ClassName::all();
    	return view('admin.settings.exam.add-form',['classes'=>$classes]);
    }
    public function addExam(Request $request){
    	$data = new Exam;
    	$data->class_id = $request->class_id;
    	$data->type_id = $request->type_id;
    	$data->exam_name = $request->exam_name;
    	$data->result_type = $request->result_type;
    	$data->status = 1;
    	$data->save();
    	return back()->with('message','Data Inserted Successfully');
    }
    public function ExamList(){
    	$classes = ClassName::all();
    	return view('admin.settings.exam.exam-list',['classes'=>$classes]);
    }
    public function ExamListByAjax(Request $request){
    	$exams = Exam::where(['class_id'=>$request->class_id,'type_id'=>$request->type_id])->get();
    	return view('admin.settings.exam.exam-table',['exams'=>$exams]);
    }
    public function courseWiseExamList(Request $request){
        $exams = Exam::where(['class_id'=>$request->class_id,'type_id'=>$request->type_id])->get();
        return view('admin.settings.exam.course-wise-exam-list',['exams'=>$exams]);
    }
}
