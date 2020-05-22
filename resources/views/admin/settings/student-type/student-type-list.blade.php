@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List <button class="bg-success text-light" data-toggle="modal" data-target="#studentTypeAddModal">Add New</button></h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Class Name</th>
                        <th>Student Type</th>
                        <th>Status</th>                       
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($student_types))
                    @php
                    	$sl = 1;
                    @endphp
                    @foreach($student_types as $student_type)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{$student_type->class_name}}</td>
                        <td>{{$student_type->student_type }}</td>
                        <td>{{$student_type->status }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>
                            <a href="#" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    	<tr class="text-danger">
                    		<td colspan="5">Student Type Not Found !!!</td>
                    	</tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
<!-- Modal -->
<div class="modal fade" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Student Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('student-type-add')}}" method="post" id="studentTypeInsert">
      <div class="modal-body">
        <div class="form-group col-12 mb-3">
		    <label for="classId" class="col-form-label">Class Name</label>
		    <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" id="classId" required autofocus>
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
		    <label for="StudentType" class="col-form-label">Student Type</label>
		    <input id="StudentType" type="text" class="form-control @error('Student_type') is-invalid @enderror" name="student_type" value="{{ old('student_type') }}" placeholder="Student Type" required autofocus>
		    @error('student_type')
		        <span class="invalid-feedback" role="alert">
		            <strong>{{ $message }}</strong>
		        </span>
		    @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
</section>


@endsection