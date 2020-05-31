@extends('admin.master')
@section('main-content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Batch Wise Student Attendance View Form</h4>
                </div>
                <form action="{{route('save-student-attendance')}}" method="post">
                    @csrf
                <div class="row ml-0 mr-0">
                    <div class="col">
                        <select name="class_id" class="form-control" id="classId">
                            <option value="">--Select Class--</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="type_id" class="form-control" id="typeId">
                            <option value="">--Select Course--</option>                         
                        </select>
                    </div>
                    <div class="col">
                        <select name="batch_id" class="form-control" id="batchId">
                            <option value="">--Select Batch--</option>                         
                        </select>
                    </div>
                    <div class="col">
                        <input type="date" name="date" id="date" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row ml-0 mr-0">
                    <div class="col" id="batchWiseStudentAttendanceView">
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('#date').change(function(){
            var classId = $('#classId').val();
            var typeId = $('#typeId').val();
            var batchId = $('#batchId').val();
            var date = $(this).val();
            $.ajax({
                url:"{{route('batch-wise-student-attendance-view')}}",
                data:{
                    class_id:classId,
                    type_id:typeId,
                    batch_id:batchId,
                    date:date
                },
                success:function(value){
                    $('#batchWiseStudentAttendanceView').html(value);
                  // console.log(value);
                }
            });
        });
    });
</script>
@endsection