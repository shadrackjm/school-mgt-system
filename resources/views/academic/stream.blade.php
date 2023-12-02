@extends('layout/academic-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

  <div class="card">
    <div class="card-header">
        Manage Forms
        <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#streamModal">Add New <i class="bi bi-person-plus-fill"></i> </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Creation Date</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($stream_data)> 0)
              @foreach($stream_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td>{{$data->created_at }}</td>
                <td><a href="/edit/subject/{{$data->id}}"><i class="bi bi-eyedropper"></i> </a>  </td>
                <td><a href="/delete/subject/{{$data->id}}" onclick="return confirm('Are you sure You want to delete?')"><i class="bi bi-trash-fill"></i></a> </td>
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
  <div class="modal fade" id="streamModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="RegisterStream">
            @csrf
            <!-- prevent cross site request forgery -->
            <div class="form-group my-2">
              <label for="">Form</label>
              <select class="form-select" name="form_id">
                <option value="">Choose Form</option>
                @foreach($form_data as $data)
                  <option value="{{$data->id}}">{{$data->form}}</option>
                @endforeach
              </select>
              <span class="text-danger" id="form_id_error"></span>
            </div>
            <div class="form-group my-2">
              <label for="">Stream</label>
              <select class="form-select" name="stream">
                <option value="">Choose Stream</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
              </select>
              <span class="text-danger" id="stream_error"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-success request">Add <i class="bi bi-save"></i> </button>
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


          $('#RegisterStream').submit(function(e){
              e.preventDefault();//prevent auto submit

              var formData = $(this).serialize();
              console.log(formData);

              $.ajax({
                  url:"{{ route('RegisterStream') }}",
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
