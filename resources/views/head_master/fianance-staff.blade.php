@extends('layout/head-master-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
  <div class="card-header">
    Manage Finance Staffs
    <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#basicModal">Add New <i class="bi bi-person-plus-fill"></i></button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm text-center">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Joining Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($finance_staff_data)> 0)
          @foreach($finance_staff_data as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
            <td>{{$data->gender}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone_number}}</td>
            <td>{{$data->created_at }}</td>
            <td><button class="btn btn-success btn-sm pull-right editButton" data-id="{{ $data->id }}" data-email="{{ $data->email }}" data-bs-toggle="modal" data-bs-target="#editModal" id="editButton">Edit <i class="bi bi-person-plus-fill"></i> </button></td>
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
<div class="modal fade" id="basicModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register Financial Staff Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="financeStaffForm">
          @csrf
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">First Name</label>
            <input type="text" name="fname" class="form-control">
            <span class="text-danger" id="fname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Middle Name</label>
            <input type="text" name="mname" class="form-control">
            <span class="text-danger" id="mname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Last Name</label>
            <input type="text" name="lname" class="form-control">
            <span class="text-danger" id="lname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Gender</label>
            <select class="form-select" name="gender">
              <option value="">Choose Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            <span class="text-danger" id="gender_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
            <span class="text-danger" id="email_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Phone Number</label>
            <input type="text" name="phone_number" class="form-control">
            <span class="text-danger" id="phone_number_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success register">Register <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
<!-- edit modal start -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Teacher Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editfinanceStaffForm">
          @csrf
          <input type="hidden" name="teacher_id" value="" id="teacher_id">
          <input type="hidden" name="old_email" value="" id="old_email">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">First Name</label>
            <input type="text" name="fname" class="form-control" id="fname">
            <span class="text-danger" id="edit_fname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Middle Name</label>
            <input type="text" name="mname" class="form-control" id="mname">
            <span class="text-danger" id="edit_mname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lname">
            <span class="text-danger" id="edit_lname_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Gender</label>
            <select class="form-select" name="gender" id="gender">
              <option value="">Choose Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            <span class="text-danger" id="edit_gender_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" id="email">
            <span class="text-danger" id="edit_email_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number">
            <span class="text-danger" id="edit_phone_number_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success register">Update <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End edit Modal-->

<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$("#financeStaffForm").submit(function(e){

  e.preventDefault();

  var formData = $(this).serialize();
  console.log(formData);

  $.ajax({
    url:"{{ route('RegisterFinanceStaff') }}",
    data:formData,
    type:"GET",
    contentType: false,
    processData:false,
    beforeSend:function(){
      $('.register').prop('disabled', true);
      $('.register').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
    },
    complete:function(){
      $('.register').prop('disabled', false);
      $('.register').html('Register <i class="bi bi-save"></i>');
    },
    success:function(data){
      if(data.success == true){
        // console.log(data.msg);
        $("#basicModal").modal('hide');
        location.reload();
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

// edit functionalities


$('.editButton').click(function(){
  var staff_id = $(this).attr('data-id');
  $('#teacher_id').val(staff_id);
       var url = '{{ route("GetFinanceStaffDetails","staff_id") }}';
           url = url.replace('staff_id',staff_id);

           $.ajax({
               url:url,
               type:"GET",
               success:function(data){
                   if(data.success == true){
                       var teacher_data = data.data;
                       $("#fname").val(teacher_data[0].firstname);
                       $("#mname").val(teacher_data[0].middlename);
                       $("#lname").val(teacher_data[0].lastname);
                       $("#gender").val(teacher_data[0].gender);
                       $("#email").val(teacher_data[0].email);
                       $("#old_email").val(teacher_data[0].email);
                       $("#phone_number").val(teacher_data[0].phone_number);
                       $("#status").val(teacher_data[0].role);
                   }else{
                       alert(data.msg);
                   }
               }
           });
});

// update teacher
$("#editfinanceStaffForm").submit(function(e){

  e.preventDefault();

  var formData = $(this).serialize();
  console.log(formData);

  $.ajax({
    url:"{{ route('EditFinanceStaff') }}",
    data:formData,
    type:"GET",
    contentType: false,
    processData:false,
    beforeSend:function(){
      $('.register').prop('disabled', true);
      $('.register').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
    },
    complete:function(){
      $('.register').prop('disabled', false);
      $('.register').html('Edit <i class="bi bi-save"></i>');
    },
    success:function(data){
      if(data.success == true){
        // console.log(data.msg);
        $("#editModal").modal('hide');
        location.reload();
        printSuccessMsg(data.msg);
      }else if(data.success == false){
        console.log(data.msg);
        // location.reload();
        printErrorMsg(data.msg);
      }else{
        // console.log(data);
        printValidationErrorMsgEdit(data.msg);
      }
    },
  });
});

function printErrorMsg(msg){
  $('#alert-danger').html('');
  $('#alert-danger').css('display','block');
  $('#alert-danger').append(''+msg+'');
}
function printSuccessMsg(msg){
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
function printValidationErrorMsgEdit(msg){
  $.each(msg, function(field_name, error){
    console.log(field_name,error);
    $(document).find('#edit_'+field_name+'_error').text(error);
  });
}

</script>
@endsection
