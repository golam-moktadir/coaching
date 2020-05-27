@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0 content">
            <div class="form-group">
                <div class="row ml-0 mr-0">
                	<div class="col-md-3">
                		<h4 class="font-weight-bold text-center">Profile of {{$student[0]->student_name}}</h4>
                		<img class="img-thumbnail" src="{{url('admin/assets/images/avatar.png')}}" style="width: 100%" alt="Profile Picture">
                		<hr>
                		<table class="table table-bordered">
                			<tr>
                				<td>
                					<button data-toggle="modal" data-target="#studentBasicInfoUpdate" class="btn btn-block my-btn-submit">Edit Profile</button>
                				</td>
                			</tr>
                		</table>
                	</div>
                	<div class="col-md-9">
                		@include('admin.student.details.basic-info')
                	</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @include('admin.student.details.modals.basic-info-update')
</section>
@endsection