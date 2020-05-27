<h4 class="pl-2 font-weight-bold">Basic Information</h4>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Student Name</th>
			<td>{{$student[0]->student_name}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$student[0]->father_name}}</td>
		</tr>
		<tr>
			<th>Father's Mobile</th>
			<td>{{$student[0]->father_mobile}}</td>
		</tr>
		<tr>
			<th>Father's Profession</th>
			<td>{{$student[0]->father_profession}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$student[0]->mother_name}}</td>
		</tr>
		<tr>
			<th>Mother's Mobile</th>
			<td>{{$student[0]->mother_mobile}}</td>
		</tr>
		<tr>
			<th>Mother's Profession</th>
			<td>{{$student[0]->mother_profession}}</td>
		</tr>
		<tr>
			<th>Email Address</th>
			<td>{{$student[0]->email_address}}</td>
		</tr>
		<tr>
			<th>Sms Mobile</th>
			<td>{{$student[0]->sms_mobile}}</td>
		</tr>
		<tr>
			<th>School</th>
			<td>{{$student[0]->school_name}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>{{$student[0]->class_name}}</td>
		</tr>
		<tr>
			<th>Student ID</th>
			<td>{{$student[0]->id}}</td>
		</tr>
		<tr>
			<th>Course Info</th>
			<td>
				@foreach($student as $stu)
					Course: {{$stu->student_type}}, Batch: {{$stu->batch_name}}, Roll No: {{$stu->roll_no}}
					<br>
				@endforeach
			</td>
		</tr>
	</table>
</div>