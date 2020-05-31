<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Paper;

class PaperManagementController extends Controller
{
    public function addPaperForm(){
    	$classes = ClassName::all();
    	return view('admin.settings.paper.add-form',['classes'=>$classes]);
    }
    public function addPaper(Request $request){
    	$data = new Paper;
    	$data->exam_id = $request->exam_id;
    	$data->paper_name = $request->paper_name;
    	$data->short_name = $request->short_name;
    	$data->mark = $request->mark;
    	$data->weight = $request->weight;
    	$data->status = 1;
    	$data->save();
    	return back()->with('message','Data Inserted Successfully');
    }
    public function paperList(){
    	$classes = ClassName::all();
    	return view('admin.settings.paper.paper-list',['classes'=>$classes]);
    }
    public function examWisePaperList(Request $request){
    	$papers = Paper::where(['exam_id'=>$request->exam_id])->get();
    	return view('admin.settings.paper.exam-wise-paper-list',['papers'=>$papers]);
    }
}
