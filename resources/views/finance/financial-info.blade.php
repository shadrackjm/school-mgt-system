@extends('layout/finance-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

  <div class="card">
    <div class="card-header">
        Manage Financial Informations
        <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#formModal">Add New <i class="bi bi-person-plus-fill"></i> </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Financial Payment Name</th>
                <th>Payment Amount</th>
                <th>Payment Registration</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($finance_info)> 0)
              @foreach($finance_info as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->payment_name }}</td>
                <td>{{ number_format($data->payment_amount,2) }} Tsh</td>
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-primary btn-sm pull-right request" data-id="{{$data->id}}" data-name="{{$data->payment_name}}" data-amount="{{$data->payment_amount}}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-eyedropper"></i> </button></td>
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
  <!-- Basic Modal -->
  <div class="modal fade" id="formModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Finance Record Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registerInfoForm">
            @csrf
            <!-- prevent cross site request forgery -->
            <div class="form-group my-2">
              <label for="">Payment Name</label>
              <input type="text" name="payment_name" class="form-control">
              <span class="text-danger" id="payment_name_error"></span>
            </div>
            <div class="form-group my-2">
                <label for="">Payment Amount</label>
                <input type="number" name="payment_amount" class="form-control number">
                <span class="text-danger" id="payment_amount_error"></span>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-success request">Save <i class="bi bi-save"></i> </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div><!-- End Basic Modal-->

   <!-- Edit Modal -->
   <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Finance Record Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateInfoForm">
            @csrf
            <input type="hidden" name="send_id" id="send_id">
            <!-- prevent cross site request forgery -->
            <div class="form-group my-2">
              <label for="">Payment Name</label>
              <input type="text" name="payment_name" class="form-control" id="payment_name">
              <span class="text-danger" id="payment_name_error"></span>
            </div>
            <div class="form-group my-2">
                <label for="">Payment Amount</label>
                <input type="number" name="payment_amount" class="form-control " id="payment_amount">
                <span class="text-danger" id="payment_amount_error"></span>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-success send">Update <i class="bi bi-save"></i> </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div><!-- End Edit Modal-->
  <script>


      $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
      $(document).ready(function(){


          $('#registerInfoForm').submit(function(e){
              e.preventDefault();//prevent auto submit

              var formData = $(this).serialize();
              console.log(formData);

              $.ajax({
                  url:"{{ route('RegisterFinanceInfo') }}",
                  data:formData,
                  type:"GET",
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
                          $("#basicModal").modal('hide');
                          location.reload();
                          printSuccessMsg(data.msg);

                      }else if(data.success == false){
                          $("#basicModal").modal('hide');
                          printErrorMsg(data.msg);
                      }else{
                          // console.log(data);
                          printValidationErrorMsg(data.msg);
                      }
                  },
              });
          });

        //   onclick
        $('.request').on('click', function(){
            var name = $(this).attr('data-name');
            var id = $(this).attr('data-id');
            var amount = $(this).attr('data-amount');

            $('#send_id').val(id);
            $('#payment_name').val(name);
            $('#payment_amount').val(amount);
        });

        $('#updateInfoForm').submit(function(e){
              e.preventDefault();//prevent auto submit

              var formData = $(this).serialize();
              console.log(formData);

              $.ajax({
                  url:"{{ route('EditInfo') }}",
                  data:formData,
                  type:"GET",
                  contentType: false,
                  processData:false,
                  beforeSend:function(){
                  $('.send').prop('disabled', true);
                  $('.send').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                  },
                  complete:function(){
                  $('.send').prop('disabled', false);
                  $('.send').html('Update <i class="bi bi-save"></i>');
                  },
                  success:function(data){
                      if(data.success == true){
                          $("#editModal").modal('hide');
                          location.reload();
                          printSuccessMsg(data.msg);

                      }else if(data.success == false){
                          $("#editModal").modal('hide');
                          printErrorMsg(data.msg);
                      }else{
                          printValidationErrorMsg(data.msg);
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

});

  </script>
@endsection
