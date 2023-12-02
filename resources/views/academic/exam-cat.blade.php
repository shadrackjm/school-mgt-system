@extends('layout/academic-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
  <div class="card">
    <div class="card-header">
        Manage Exams Categories
        <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#formModal">Add New <i class="bi bi-person-plus-fill"></i> </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Term</th>
                <th>Exam Category</th>
                <th>Enable</th>
                <th>Disable</th>
              </tr>
            </thead>
            <tbody>
              @if(count($exam_cat)> 0)
              @foreach($exam_cat as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->term }}</td>
                <td>{{$data->exam_category }}</td>
                @if($data->status == 0)
                    <td><a href="/enable/cat/{{$data->id}}" class="btn btn-success btn-sm"><i class="bi bi-eye-fill"></i> </a>  </td>
                    <td><button disabled class="btn btn-danger btn-sm"><i class="bi bi-eye-slash-fill"></i> </button>  </td>
                @elseif($data->status == 1)
                    <td><button disabled class="btn btn-success btn-sm"><i class="bi bi-eye-fill"></i> </button>  </td>
                    <td><a href="/disable/cat/{{$data->id}}" onclick="return confirm('Are you sure You want to disable?')" class="btn btn-danger btn-sm"><i class="bi bi-eye-slash-fill bi-2"></i></a> </td>
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
  <!-- Basic Modal -->
  <div class="modal fade" id="formModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Exam Category Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="regiserExamCat">
            @csrf
            <!-- prevent cross site request forgery -->
            <div class="form-group my-2">
              <label for="">term</label>
              <select name="term" id="term" class="form-select">
                <option value="">Choose Term</option>
                <option value="term1">Term 1</option>
                <option value="term2">Term 2</option>
              </select>
              <span class="text-danger" id="term_error"></span>
            </div>
            <div class="form-group my-2">
                <label for="">Exam Name</label>
                <select name="cat" id="cat" class="form-control">
                 
                </select>
                <span class="text-danger" id="cat_error"></span>
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
        $('#term').on('change',function(){
            var term = $(this).val();

            if(term == 'term1'){
                $('#cat').html('');
                $('#cat').html('<option>Choose Exam Category</option><option value="test1">Test</option><option value="midterm1">Midterm</option><option value="terminal">Terminal</option>');

            }else if(term == 'term2'){
                $('#cat').html('');
                $('#cat').html('<option>Choose Exam Category</option><option value="test2">Test</option><option value="midterm2">Midterm</option><option value="annual">Annual</option>');
            }
        });

          $('#regiserExamCat').submit(function(e){
              e.preventDefault();//prevent auto submit
              var formData = $(this).serialize();

              $.ajax({
                  url:"{{ route('RegisterExamCat') }}",
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
                  $('.request').html('add <i class="bi bi-save"></i>');
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
