@extends('layout/head-master-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
    <div class="card-header">Permission Record
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Teacher's Name</th>
                        <th>Request Date</th>
                        <th>Duration</th>
                        <th>Reason</th>
                        <th>Permission Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($permission_data) > 0 )
                    @foreach($permission_data as $data)
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
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

						@if($data->status == 0)
							<td><button class="btn btn-success btn-sm pull-right acceptButton" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#acceptModal">Accept <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->status == 1)
							<td><button disabled class="btn btn-success btn-sm pull-right " data-bs-toggle="modal" data-bs-target="">Accepted <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->status == 2)
							<td><button class="btn btn-success btn-sm pull-right acceptButton" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#acceptModal">Accept <i class="bi bi-person-plus-fill"></i> </button></td>
                        @endif
						@if($data->status == 0)
						<td><button class="btn btn-danger btn-sm pull-right rejectButton" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->status == 1)
						<td><button class="btn btn-danger btn-sm pull-right rejectButton" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject <i class="bi bi-person-plus-fill"></i> </button></td>
                        @elseif($data->status == 2)
						<td><button disabled class="btn btn-danger btn-sm pull-right rejectButton" data-id="" data-bs-toggle="modal" data-bs-target="">Reject <i class="bi bi-person-plus-fill"></i> </button></td>
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
<div class="modal fade" id="acceptModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Accept Permission Request Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="acceptForm">
          @csrf
		  <input type="hidden" name="request_id" id="accept_id">
		  <input type="hidden" name="teacher_id" id="teacher_id">
		  <h5 id="teachers_name">Teachers Name:</h5>
          <p class="acceptReview my-2 text-center"></p><hr>
		  <label for="">Permission Duration <small class="text-danger">(Duration must be in days only.)</small></label>
		  <input type="number" name="duration" placeholder="Eg. 2 days" class="form-control">
		  <span class="text-danger" id="duration_error"></span>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success request">Accept Request <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
<!-- Basic Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Reject Permission Request Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="rejectForm">
          @csrf
		  <input type="hidden" name="teacher_id" id="teacher_id">
		  <input type="hidden" name="request_id" id="reject_id">
          <p class="rejectReview my-2 text-center"></p><hr>
		  <textarea name="remark" id="" cols="30" rows="10" class="form-control"></textarea>
		  <span class="text-danger" id="remark_error"></span>

      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-danger request">Reject Request <i class="bi bi-save"></i> </button>
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
    $(document).ready(function(){


        $('#acceptForm').submit(function(e){
            e.preventDefault();//prevent auto submit

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url:"{{ route('AcceptPermission') }}",
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
                        $("#acceptModal").modal('hide');
                        location.reload();
                        // printSuccessMsg(data.msg);

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
		// reject form
		$('#rejectForm').submit(function(e){
            e.preventDefault();//prevent auto submit

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url:"{{ route('RejectPermission') }}",
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
                        $("#rejectModal").modal('hide');
                        location.reload();
                        // printSuccessMsg(data.msg);

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
		// onclikc accept
		$('.acceptButton').click(function(){
			var request_id = $(this).attr('data-id');
			$('#accept_id').val(request_id);
				var url = '{{ route("GetRequestDetails","request_id") }}';
					url = url.replace('request_id',request_id);

           $.ajax({
               url:url,
               type:"GET",
               success:function(data){
                   if(data.success == true){
                       var request_data = data.data;
					//    console.log(request_data);
                       $(".acceptReview").html('<b>'+request_data[0].reason+'</b>');
					             $("#teacher_id").val(request_data[0].teacher_id);

                   }else{
                       alert(data.msg);
                   }
               }
           });
});
//onclikc reject button
		$('.rejectButton').click(function(){
			var request_id = $(this).attr('data-id');
			$('#reject_id').val(request_id);
				var url = '{{ route("GetRequestDetails","request_id") }}';
					url = url.replace('request_id',request_id);

           $.ajax({
               url:url,
               type:"GET",
               success:function(data){
                   if(data.success == true){
                       var request_data = data.data;
                       $(".rejectReview").html('<b>'+request_data[0].reason+'</b>');
					   $("#teacher_id").val(request_data[0].teacher_id);

                   }else{
                       alert(data.msg);
                   }
               }
           });
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
</script>
@endsection
