<thead>
<tr>
	<th>Sl</th>
	<th>Exam Name</th>
	
</tr>
</thead>
<body>
@php
	$i = 1
@endphp
@foreach($exams as $exam)
<tr>
	<td>{{$i++}}</td>
	<td>{{$exam->exam_name}}</td>
</tr>
@endforeach
</body>