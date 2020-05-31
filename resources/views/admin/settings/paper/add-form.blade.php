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
                    <h4 class="text-center font-weight-bold font-italic mt-3">Paper Add Form</h4>
                </div>
            </div>
            <form method="POST" action="{{route('add-paper')}}" autocomplete="off" class="form-inline">
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
                    <label for="typeId" class="col-sm-3 col-form-label text-right">Course</label>
                    <select name="type_id" class="col-sm-9 form-control @error('type_id') is-invalid @enderror" id="typeId" required>
                        <option>--Select Course--</option>
                    </select>
                    @error('class_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="examId" class="col-sm-3 col-form-label text-right">Exam Name</label>
                    <select name="exam_id" class="col-sm-9 form-control @error('exam_id') is-invalid @enderror" id="examId" required>
                        <option>--Select Exam--</option>
                    </select>
                    @error('exam_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="paperName" class="col-sm-3 col-form-label text-right">Paper Name</label>
                    <input id="paperName" type="text" class="col-sm-9 form-control @error('paper_name') is-invalid @enderror" name="paper_name" value="{{ old('paper_name') }}" placeholder="Paper Name" required autofocus>
                    @error('paper_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="shortName" class="col-sm-3 col-form-label text-right">Short Name</label>
                    <input id="shortName" type="text" class="col-sm-9 form-control @error('short_name') is-invalid @enderror" name="short_name" value="{{ old('short_name') }}" placeholder="Paper Short Name" required autofocus>
                    @error('short_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="mark" class="col-sm-3 col-form-label text-right">Mark</label>
                    <input id="mark" type="number" min="0" class="col-sm-9 form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" placeholder="Paper Mark" required autofocus>
                    @error('mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="weight" class="col-sm-3 col-form-label text-right">Weight (%)</label>
                    <input id="weight" type="number" min="0" class="col-sm-9 form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" placeholder="Paper weight" autofocus>
                    @error('weight')
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#typeId').change(function(){
            var classId = $('#classId').val();
            var typeId = $(this).val();
            $.ajax({
                url: "{{route('course-wise-exam-list')}}",
                data:{class_id:classId,type_id:typeId},
                success:function(value){
                  //  console.log(value);
                    $('#examId').html(value);              
                }            
            });
        });
    });
</script>
@endsection