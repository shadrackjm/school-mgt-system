@extends('layout/teacher-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
  <div class="card">
    <div class="card-header">
        Student attendance
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form id="AttendanceForm">
                @csrf
        <table class="table table-bordered table-sm text-center ">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration number</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Permission</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
                @foreach($student_data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                    <td>{{ $data->registration_number }}</td>
                    <td><input type="checkbox" name="present[]" id="present"></td>
                    <td><input type="checkbox" name="absent[]" id="absent"></td>
                    <td><input type="checkbox" name="permission[]" id="permission"></td>
                    <input type="hidden" name="student_id[]" value="{{$data->id}}" id="student_id">
                </tr>
                @endforeach
              @else
              <tr>
                <td colspan="8">No data Found!</td>
              </tr>
              @endif
            </tbody>
        </table>
        <span class="text-danger"  id="present_error"></span><br>
        <span class="text-danger"  id="absent_error"></span><br>
        <span class="text-danger"  id="permission_error"></span><br>
        <span class="text-danger"  id="student_id_error"></span><br>
            <button type="submit" name="button" class="btn btn-success btn-sm request">Save</button>
        </form>
    </div>
    </div>
  </div>
  <script>
    // disable the unchecked check boxes in a tr
    $('body').on('change' , 'tr input' , function () {

        var count_checked = 0;

        $(this).parent().parent().find('input:checked').each(function() {
            count_checked++;
        });

        if(count_checked > 0){
            $(this).parent().parent().find('input').each(function () {
                $(this).prop('disabled' , true);
                $('#student_id').prop('disabled',false);
            })
            $(this).removeAttr('disabled')
        } else {
            $(this).parent().parent().find("input").removeAttr('disabled')
        }
    });
  
     $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $('#AttendanceForm').submit(function(e){
            e.preventDefault();//prevent auto submit
           
               var formData = $(this).serialize();
                console.log(formData);

            $.ajax({
                url:"{{ route('createAttendance') }}",
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
                        console.log(data.msg);
                        
                        // location.reload();
                        printSuccessMsg(data.msg);

                    }else if(data.success == false){
                        console.log(data.msg);
                        // location.reload();
                        printErrorMsg(data.msg);
                    }else{
                        // console.log(data);
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
