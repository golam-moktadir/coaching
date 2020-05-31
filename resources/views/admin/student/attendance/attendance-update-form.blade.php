

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
                    @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{$attendance->student_name}}</td>
                        <td>{{$attendance->roll_no}}</td>
                        <td>{{$attendance->school_name}}</td>
                        <td>{{$attendance->sms_mobile}}</td>
                        <td>{{$attendance->student_id}}</td>                        
                        <td>                            
                            Present <input type="radio" value="1" name="attendance[{{$attendance->id}}]" {{$attendance->attendance == 1 ? 'checked':''}}>
                            Absent <input type="radio" value="2" name="attendance[{{$attendance->id}}]" {{$attendance->attendance == 2 ? 'checked':''}}>
                        </td>
                    </tr>
                    @endforeach
                    @if(count($attendances)>0)
                        <tr>
                            <td colspan="7">
                                <button type="submit" class="btn btn-block my-btn-submit">Update Attendance</button>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
         