@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row content registration-form">
        <div class="col-12 pl-0 pr-0">
		    @if(Session::get('message'))
	            <div class="alert alert-success alert-dismissible fade show" role="alert">
	                <strong>Message : </strong> {{ Session::get('message') }}
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	        @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Batch Add Form</h4>
                </div>
            </div>
            <form method="POST" action="{{route('save-batch')}}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
            	@csrf
            	<div class="form-group col-12 mb-3">
                    <label for="classId" class="col-sm-3 col-form-label text-right">Class Name</label>
                    <select name="class_id" class="col-sm-9 form-control @error('class_id') is-invalid @enderror" id="classId" required autofocus>
                    	<option>--Select Class--</option>
                    	@foreach($classes as $class)
                    		<option value="{{$class->id}}">{{$class->class_name}}</option>
                    	@endforeach
                    </select>
                    @error('class_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="typeId" class="col-sm-3 col-form-label text-right">Student Type</label>
                    <select name="type_id" class="col-sm-9 form-control @error('type_id') is-invalid @enderror" id="typeId" required>
                        <option>--Select Type--</option>
                    </select>
                    @error('class_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="BatchName" class="col-sm-3 col-form-label text-right">Batch Name</label>
                    <input id="BatchName" type="text" class="col-sm-9 form-control @error('batch_name') is-invalid @enderror" name="batch_name" value="{{ old('batch_name') }}" placeholder="Batch Name" required autofocus>
                    @error('batch_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="studentCapacity" class="col-sm-3 col-form-label text-right">Student Capacity</label>
                    <input id="studentCapacity" type="text" class="col-sm-9 form-control @error('student_capacity') is-invalid @enderror" name="student_capacity" value="{{ old('student_capacity') }}" placeholder="Student Capacity" required autofocus>
                    @error('student_capacity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection