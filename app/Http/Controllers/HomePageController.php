<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderFooter;

class HomePageController extends Controller
{
    public function addHeaderFooterForm(){
    	$headerFooter = HeaderFooter::first();
    	if(isset($headerFooter)){
    		return view('admin.home.manage-header-footer-form',['headerFooter'=>$headerFooter]);
    	}
    	else{
    		return view('admin.home.add-header-footer-form');
    	}
    }
    public function HeaderAndFooterSave(Request $request){
    	$this->headerFooterValidation($request);

    	$data = new HeaderFooter();
    	$data->owner_name = $request->owner_name;
    	$data->owner_department = $request->owner_department;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->copyright = $request->copyright;
    	$data->status = $request->status;
    	$data->save();

    	return redirect('/home')->with('message','Header and Footer added Successfully');
    }
    public function manageHeaderFooter($id){
    	$headerFooter = HeaderFooter::find($id);
    	return view('admin.home.manage-header-footer-form',['headerFooter'=>$headerFooter]);
    }

    public function HeaderAndFooterUpdate(Request $request){
    	$this->headerFooterValidation($request);
    	$data = HeaderFooter::find($request->id);
    	$data->owner_name = $request->owner_name;
    	$data->owner_department = $request->owner_department;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->copyright = $request->copyright;
    	$data->save();

    	return redirect('/home')->with('message','Header and Footer updated Successfully');
    }
    protected function headerFooterValidation($request){
    	$this->validate($request,[
    					'owner_name'=>'required',
    					'owner_department'=>'required',
    					'mobile'=>'required',
    					'address'=>'required',
    					'copyright'=>'required'
    					]);
    }
}
