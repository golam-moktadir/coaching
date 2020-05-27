<!-- Modal -->
<div class="modal fade" id="studentBasicInfoUpdate" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Student Basic Info Update Form</h5>
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
		    	<!--  -->
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