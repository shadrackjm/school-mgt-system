@extends('layout/academic-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
    <div class="card-header">Permission Record
    <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#requestModal">Request <i class="bi bi-person-plus-fill"></i> </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Permission Date</th>
                        <th>Duration</th>
                        <th>Reason</th>
                        <th>Permission Status</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($permission_data) > 0 )
                    @foreach($permission_data as $data)
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data->created_at}}</td>
                        <td>{{ $data->duration ?? '-'}} days</td>
                        <td>{{ $data->reason}}</td>
                        @if($data->status == 0)
                          	<td><span class="badge bg-warning">Pending...</span></td>
                        @elseif($data->status == 1)
                        	<td><span class="badge bg-success">Accepted</span></td>
                        @elseif($data->status == 2)
							              <td><span class="badge bg-danger">Rejected</span></td>
                        @endif
                      </tr>
                    @endforeach
                  @else
                  <tr>
                    <td colspan="5">No data found!</td>
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
        <h5 class="modal-title">Request Permission Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="permissionForm">
          @csrf
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Reason</label>
            <textarea name="reason" id="" cols="30" rows="10" id="reason" class="form-control"></textarea>
            <span class="text-danger" id="reason_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success request">Send Request <i class="bi bi-save"></i> </button>
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
    // $(document).ready(function(){


        $('#permissionForm').submit(function(e){
            e.preventDefault();//prevent auto submit

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url:"{{ route('RequestPermission') }}",
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
                $('.request').html('Send Request <i class="bi bi-save"></i>');
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
    // });

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
</script>
@endsection