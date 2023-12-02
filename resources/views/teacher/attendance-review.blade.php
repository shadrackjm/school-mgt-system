@extends('layout/teacher-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
  <div class="card">
    <div class="card-header">
        Student attendance Review
        <a href="/class/attendance" class="btn btn-outline-success btn-sm mx-5">Attendance</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-sm text-center ">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration number</th>
                <th>Attendance</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
                @foreach($student_data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                    <td>{{ $data->registration_number }}</td>
                    <!-- badge -->
                        @if($data->attendance == 1)
                        <td><span class="badge bg-success">Present</span></td>
                        @elseif($data->attendance == 2)
                        <td><span class="badge bg-danger">Absent</span></td>
                        @elseif($data->attendance == 3)
                        <td><span class="badge bg-warning">Permission</span></td>
                        @endif
                        <!-- buttons -->
                        @if($data->attendance == 1)
                        <td><button class="btn btn-primary btn-sm pull-right updateBtn" data-id="{{$data->id}}" data-status="{{$data->attendance}}" data-bs-toggle="modal" data-bs-target="#updateModal">Update <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->attendance == 2)
                        <td><button class="btn btn-primary btn-sm pull-right updateBtn" data-id="{{$data->id}}" data-status="{{$data->attendance}}" data-bs-toggle="modal" data-bs-target="#updateModal">Update <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->attendance == 3)
                        <td><button class="btn btn-primary btn-sm pull-right " disabled>Update <i class="bi bi-person-plus-fill"></i> </button></td>
                        @endif
                      </tr>
                @endforeach
              @else
              <tr>
                <td colspan="8">No data Found!</td>
              </tr>
              @endif
            </tbody>
        </table>
    </div>
    </div>
  </div>
  <!-- Basic Modal -->
<div class="modal fade" id="updateModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Permission Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateAttendance">
          @csrf
            <input type="hidden" name="student_id" class="student_id">
            <input type="hidden" name="attendance_status" class="attendance_status">
          <!-- prevent cross site request forgery -->
                        <select name="attendance" class="form-select" id="attendance">
                            
                        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success update">Update <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->

  <script>
    
  
     $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    // onchenge of select
    $('.updateBtn').on('click',function() {
        var student_id = $(this).attr('data-id');
        var attendance = $(this).attr('data-status');
        // paste value on the modal hidden inputs
        $('.student_id').val(student_id);
        $('.attendance_status').val(attendance);

        var new_attendance = '';
        console.log(attendance);

        if (attendance == 3) {
           new_attendance  = 'Permission';
                $('.update').text('yes');
                $('#attendance').remove();
                // $('#updateAttendance').html('');
                $('#updateAttendance').append('Are you sure you want to remove student from permission?');
        }else if(attendance == 2){
            new_attendance = 'Absent';
            $('#attendance').html('<option value="'+attendance+'">'+new_attendance+'</option>');
            $('#attendance').append('<option value="1">Present</option><option value="2">Absent</option><option value="3">Permission</option>');
        }else if(attendance == 1){
            new_attendance = 'Present';
            $('#attendance').html('<option value="'+attendance+'">'+new_attendance+'</option>');
            $('#attendance').append('<option value="1">Present</option><option value="2">Absent</option><option value="3">Permission</option>');
        }else{

        }
    });

    $('#updateAttendance').submit(function(e){
            e.preventDefault();//prevent auto submit
           
               var formData = $(this).serialize();
                console.log(formData);

            $.ajax({
                url:"{{ route('UpdateAttendance') }}",
                type:"GET",
                data:formData,
                contentType: false,
                processData:false,
                beforeSend:function(){
                $('.request').prop('disabled', true);
                $('.request').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                },
                complete:function(){
                $('.request').prop('disabled', false);
                $('.request').html('Save <i class="bi bi-save"></i>');
                },
                success:function(data){
                    if(data.success == true){
                        $('#updateModal').modal('hide');
                        printSuccessMsg(data.msg);
                        
                    }else if(data.success == false){
                        console.log(data.msg);
                        $('#updateModal').modal('hide');
                        printErrorMsg(data.msg);
                    }else{
                        printValidationErrorMsg(data.msg);
                    }
                },
            });


        });
    // });

    function printErrorMsg(msg){
  $('#alert-success').html('');
  $('#alert-success').css('display','none');
  $('#alert-danger').html('');
  $('#alert-danger').css('display','block');
  $('#alert-danger').append(''+msg+'');
}
function printSuccessMsg(msg){
  $('#alert-danger').html('');
  $('#alert-danger').css('display','none');
  $('#alert-success').html('');
  $('#alert-success').css('display','block');
  $('#alert-success').append(''+msg+'');
  // document.getElementById('AssignSupervisor').close();
}
function printValidationErrorMsg(msg){
  $.each(msg, function(field_name, error){
    console.log(field_name,error);
    $(document).find('#'+field_name+'_error').text(error);
  });
}
  </script>
@endsection
