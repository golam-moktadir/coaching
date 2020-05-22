<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Batch;
use App\StudentType;
class BatchManagementController extends Controller
{
    public function addBatch(){
    	$classes = ClassName::all();
    	return view('admin.settings.batch.add-form',['classes'=>$classes]);
    }
    public function saveBatch(Request $request){
    	$this->validate($request,['class_id'=>'required','type_id'=>'required','batch_name'=>'required|string','student_capacity'=>'required']);
    
	    $data = new Batch();
	    $data->class_id = $request->class_id;
	    $data->student_type_id = $request->type_id;
	    $data->batch_name = $request->batch_name;
	    $data->student_capacity = $request->student_capacity;
	    $data->status = 1;
	    $data->save();

	    return back()->with('message','Batch Added Successfully');
	}
	public function batchList(){
    	$classes = ClassName::all();		
		return view('admin.settings.batch.batch-list',['classes'=>$classes]);
	}
	public function batchListByAjax(Request $request){		
		 $batches = Batch::where(['class_id'=>$request->class_id,'student_type_id'=>$request->type_id])->get();
		 if(count($batches)>0){
			 return view('admin.settings.batch.batch-list-by-ajax',['batches'=>$batches]);
		 }else{
			 return view('admin.settings.batch.batch-empty-error');
		 }
	}
	public function classWiseStudentType(Request $request){
		$types = StudentType::where('class_id',$request->class_id)->get();
		if(count($types)>0){
			return view('admin.settings.batch.class-wise-student-type',['types'=>$types]);
		}
		else{
			echo "<option>--Select Type--</option>";
		}
	}
}
