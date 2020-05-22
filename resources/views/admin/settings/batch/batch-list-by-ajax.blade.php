<thead>
<tr>
	<th>Sl</th>
	<th>Batch Name</th>
	
</tr>
</thead>
<body>
@php
	$i = 1
@endphp
@foreach($batches as $batch)
<tr>
	<td>{{$i++}}</td>
	<td>{{$batch->batch_name}}</td>
</tr>
@endforeach
</body>