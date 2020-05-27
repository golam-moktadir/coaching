

            <div class="table-responsive p-1">
                <table id="classWisestudentList" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Roll</th>
                        <th>School</th>
                        <th>Father's Name</th>
                        <th>Father's Mobile</th>
                        <th>Mother's Name</th>
                        <th>Mother's Mobile</th>
                        <th>Sms Mobile</th>
                        <th>Student ID</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @php
                    	$sl = 1;
                    @endphp
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{$student->student_name}}</td>
                        <td>{{$student->batch_name}}</td>
                        <td>{{$student->roll_no}}</td>
                        <td>{{$student->school_name}}</td>
                        <td>{{$student->father_name}}</td>
                        <td>{{$student->father_mobile}}</td>
                        <td>{{$student->mother_name}}</td>
                        <td>{{$student->mother_mobile}}</td>
                        <td>{{$student->sms_mobile}}</td>
                        <td>{{$student->id}}</td>                        
                        <td>
                            <a href="{{route('student-details',['id'=>$student->id])}}" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>         
                        	
                            <a href="#" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>                            
                            <a href="#" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
            	$(document).ready(function() {
				    $('#classWisestudentList').DataTable({
				        fixedHeader:true
				    });
				} );
            </script>
      