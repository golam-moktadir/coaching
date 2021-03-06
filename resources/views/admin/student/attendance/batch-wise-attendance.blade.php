

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
                            <span class="badge badge-{{$attendance->attendance == 1 ? 'success':'danger'}}">{{$attendance->attendance == 1 ? 'Present':'Absent'}}</span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
         