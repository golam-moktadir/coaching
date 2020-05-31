<thead>
<tr>
	<th>Sl</th>
	<th>Paper Name</th>
	<th>Short Name</th>
	<th>Mark</th>
	<th>Weight</th>
	
</tr>
</thead>
<body>
@php
	$i = 1
@endphp
@foreach($papers as $paper)
<tr>
	<td>{{$i++}}</td>
	<td>{{$paper->paper_name}}</td>
	<td>{{$paper->short_name}}</td>
	<td>{{$paper->mark}}</td>
	<td>{{$paper->weight}}</td>
</tr>
@endforeach
</body>