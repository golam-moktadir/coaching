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
                    <h4 class="text-center font-weight-bold font-italic mt-3">School Add Form</h4>
                </div>
            </div>
            <form method="POST" action="{{ route('school-save') }}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
            	@csrf
                <div class="form-group col-12 mb-3">
                    <label for="schoolName" class="col-sm-3 col-form-label text-right">School Name</label>
                    <input id="schoolName" type="text" class="col-sm-9 form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" placeholder="School Name" required autofocus>
                    @error('school_name')
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