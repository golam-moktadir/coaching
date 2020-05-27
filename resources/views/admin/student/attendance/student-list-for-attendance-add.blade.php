

            <div class="table-responsive p-1">
                <table class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>School</th>
                        <th>Sms Mobile</th>
                        <th>Student ID</th>
                        <th>Action</th>
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
                        <td>{{$student->roll_no}}</td>
                        <td>{{$student->school_name}}</td>
                        <td>{{$student->sms_mobile}}</td>
                        <td>{{$student->id}}</td>                        
                        <td>                            
                            Present <input type="radio" value="1" name="attendance[{{$student->id}}]">
                            Absent <input type="radio" value="2" name="attendance[{{$student->id}}]" checked="checked">
                        </td>
                    </tr>
                    @endforeach
                    @if(count($students)>0)
                        <tr>
                            <td colspan="7">
                                <button type="submit" class="btn btn-block my-btn-submit">Submit Attendance</button>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
         