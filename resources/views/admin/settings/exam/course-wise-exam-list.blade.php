@if(count($exams)>0)
	<option value="">--Select Exam--</option>
	@foreach($exams as $exam)
		<option value="{{$exam->id}}">{{$exam->exam_name}}</option>
	@endforeach
@else
	<option value="">--Select Exam--</option>
@endif