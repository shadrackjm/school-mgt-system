@extends('layout/teacher-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
  <div class="card">
    <div class="card-header">
        Student Permission 
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-sm text-center ">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration number</th>
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
                    <td><button class="btn btn-success btn-sm pull-right accept" data-id="{{$data->id}}" data-bs-toggle="modal" data-bs-target="#requestModal">Accept <i class="bi bi-person-check-fill"></i> </button></td>
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
<div class="modal fade" id="requestModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Permission Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="acceptpermissionForm">
          @csrf
          <!-- prevent cross site request forgery -->
          <input type="hidden" name="student_id" class="student_id">
          <div class="form-group my-2">
            <label for="">Reason</label>
            <textarea name="reason" id="" cols="30" rows="5" id="reason" class="form-control"></textarea>
            <span class="text-danger" id="reason_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Duration</label>
           <input type="number" name="duration" id="" class="form-control">
            <span class="text-danger" id="duration_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success btn-sm request">Accept <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
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

    // onclick
    $('.accept').on('click',function() {
        var student_id = $(this).attr('data-id');

        $(".student_id").val(student_id); 
    });
    $('#acceptpermissionForm').submit(function(e){
            e.preventDefault();//prevent auto submit
           
               var formData = $(this).serialize();
                console.log(formData);

            $.ajax({
                url:"{{ route('createPermission') }}",
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
                        $("#requestModal").modal('hide');
                        printSuccessMsg(data.msg);
                    }else if(data.success == false){
                        console.log(data.msg);
                        $("#requestModal").modal('hide');
                        printErrorMsg(data.msg);
                    }else{
                        printValidationErrorMsg(data.msg);
                    }
                },
            });
        });

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
