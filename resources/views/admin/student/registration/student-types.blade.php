<div class="form-group col-md-6 mb-3">
    <label for="classId" class="col-sm-4 col-form-label text-right">class Name</label>
    <select name="class_id" class="form-control col-sm-8" id="classId" required>
        <option value="">Select Class</option>
        @foreach($classes as $class)
            <option value="{{$class->id}}" {{$class->id == $data->class_id ? 'selected':''}}>{{$class->class_name}}</option>
        @endforeach
    </select>
    <span class="text-danger"></span>
</div>

<div class="form-group col-md-6 mb-3">
    <label class="col-sm-4 col-form-label text-right">Student Type</label>
    <div class="col-sm-8" id="type">
    	@if(count($types)>0)	
			@foreach($types as $type)
				<input type="checkbox" id="studentType-{{$type->id}}" name="student_type[{{$type->id}}]" value="{{$type->id}}" class="mr-2"/>{{$type->student_type}}
			@endforeach
		@else
			<span class="text-danger">Please Add Some Types First</span>
		@endif
    </div>                        
</div>
@foreach($types as $type)
	<div class="col-12" id="batchRollInfo-{{$type->id}}"></div>
@endforeach

<script type="text/javascript">
	@foreach($types as $type)
		$('#studentType-{{$type->id}}').change(function(){
			var typeId = $(this).val();
			if($(this).prop('checked')){
				var classId = $('#classId').val();
				if(classId && typeId){
					$.ajax({
						url:"{{route('batch-roll-form')}}",
						data:{class_id:classId,type_id:typeId},
						success:function(response){
							$('#batchRollInfo-'+typeId).html(response);
						}
					});
				}
			}
			else{
				$('#batchRollInfo-'+typeId).empty();
			}
		});
	@endforeach

	$('#classId').change(function(){
        var class_id = $(this).val(); 
        $.ajax({
            url:"{{route('bring-student-type')}}",
            data:{class_id:class_id},
            success:function(response){
                console.log(response);
                $('#batchInfo').html(response);
            }
        });
    });
</script>