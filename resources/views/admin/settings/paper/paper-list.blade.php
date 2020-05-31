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
                    <h4 class="text-center font-weight-bold font-italic mt-3">Exam Wise Paper List</h4>
                </div>
            </div>
            <form method="POST" action="" enctype="multipart/form-data" autocomplete="off" class="form-inline">  	
              <div class="form-group col-12 mb-3">
                <label for="classId" class="col-sm-3 col-form-label text-right">Class Name</label>
                <select name="class_id" class="col-sm-9 form-control @error('class_id') is-invalid @enderror" id="classId" required autofocus>
                	<option>--Select Class--</option>
                	@foreach($classes as $class)
                		<option value="{{$class->id}}">{{$class->class_name}}</option>
                	@endforeach
                </select>  
              </div>  
              <div class="form-group col-12 mb-3">
                    <label for="typeId" class="col-sm-3 col-form-label text-right">Course</label>
                    <select name="type_id" class="col-sm-9 form-control @error('type_id') is-invalid @enderror" id="typeId" required>
                        <option>--Select Type--</option>
                        
                    </select>
                    @error('type_id')
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
            </form>
            <div class="table-responsive">
            	<table class="table table-bordered table-hover text-center" id="paperList"></table>
            </div>
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
        $('#examId').change(function(){
            var examId = $(this).val();
            $.ajax({
                url: "{{route('exam-wise-paper-list')}}",
                data:{exam_id:examId},
                success:function(value){
                  //  console.log(value);
                    $('#paperList').html(value);              
                }            
            });
        });
    });
</script>
@endsection