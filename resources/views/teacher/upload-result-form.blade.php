@extends('layout/teacher-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
    <div class="card-header">
        Upload students result
        <div class="row">
                <div class="col">
                    <select name="term" id="term" class="form-select">
                        <option value="">choose Term</option>
                        <option value="term1">Term 1</option>
                        <option value="term2">Term 2</option>
                    </select>
                </div>
                <div class="col">
                    <select name="options" id="options" class="form-select">
                    </select>
                </div>
            </div>
    </div>
    <div class="card-body">
        <!-- test term 1 table -->
        <div class="table-responsive" id="hidden1">
            <h5>Term 1 - Test </h5>
        <table class="table table-bordered table-sm text-center" >
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right test1" data-id="{{$data->id}}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#testTerm1Modal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end test term 1 table -->
          <!-- test term 2 table -->
          <div class="table-responsive" id="hidden2">
          <h5>Term 2 - Test </h5>
        <table class="table table-bordered table-sm text-center" >
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right test2" data-id="{{ $data->id }}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#testTerm2Modal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end test term 2 table -->

          <!-- mid term 1 table -->
          <div class="table-responsive" id="hidden3">
          <h5>Term 1 - Midterm </h5>
        <table class="table table-bordered table-sm text-center" >
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right midterm1" data-id="{{ $data->id }}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#midTerm1Modal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end mid term 1 table -->
          <!-- mid term 2 table -->
          <div class="table-responsive" id="hidden4">
          <h5>Term 2 - Midterm </h5>
        <table class="table table-bordered table-sm text-center" >
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right midterm2" data-id="{{ $data->id}}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#midTerm2Modal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end mid term 2 table -->
          <!--  terminal  table -->
          <div class="table-responsive" id="hidden5">
          <h5>Terminal </h5>
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right terminal" data-id="{{$data->id}}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#terminalModal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end termial  table -->
          <!-- annual table -->
          <div class="table-responsive" id="hidden6">
          <h5>Annual </h5>
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Registration #</th>
                <th>Student Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Registration Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{$data->form }}</td>
                <td>{{$data->stream }}</td>
                <td>{{$data->category ?? '-'}}</td>
                <!-- null coalescing operator -->
                <td>{{$data->created_at }}</td>
                <td><button class="btn btn-success btn-sm pull-right annual" data-id="{{$data->id}}" data-form="{{$data->form}}" data-stream="{{$data->stream}}" data-subject="{{$teacher_subject_data->subject_id}}" data-bs-toggle="modal" data-bs-target="#annualModal">Upload <i class="bi bi-upload"></i> </button></td>
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
        <!-- end annual table -->
    </div>
  </div>
  <!-- Basic Modal -->
<div class="modal fade" id="testTerm1Modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Term 1 Test Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="test1Form">
          @csrf
          <input type="hidden" name="student_id" id="student_id">
          <input type="hidden" name="form" id="form">
          <input type="hidden" name="stream" id="stream">
          <input type="hidden" name="subject_id" id="subject_id">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number" max="100" min="0" name="test1" id="" class="form-control">
            <span class="text-danger" id="test1_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success test1btn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Basic Modal-->

  <!-- Basic Modal -->
  <div class="modal fade" id="testTerm2Modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Term 2 Test Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="test2Form">
          @csrf
          <input type="text" name="student_id" class="student_id">
          <input type="hidden" name="form" class="form">
          <input type="hidden" name="stream" class="stream">
          <input type="hidden" name="subject_id" class="subject_id">

          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number" max="100" min="0" name="test2" id="" class="form-control">
            <span class="text-danger" id="test2_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success test2btn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->

  <!-- Basic Modal -->
  <div class="modal fade" id="midTerm1Modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Term 1 Midterm Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="midterm1Form">
          @csrf
          <input type="text" name="student_id" class="student_id">
          <input type="hidden" name="form" class="form">
          <input type="hidden" name="subject_id" class="subject_id">
          <input type="hidden" name="stream" class="stream">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number" max="100" min="0" name="midterm1" id="" class="form-control">
            <span class="text-danger" id="midterm1_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success midterm1btn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Basic Modal-->

  <!-- Basic Modal -->
  <div class="modal fade" id="midTerm2Modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Term 2 Midterm Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="midterm2Form">
          @csrf
          <input type="text" name="student_id" class="student_id">
          <input type="hidden" name="form" class="form">
          <input type="hidden" name="subject_id" class="subject_id">
          <input type="hidden" name="stream" class="stream">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number"  max="100" min="0" name="midterm2" id="" class="form-control">
            <span class="text-danger" id="midterm2_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success midterm2btn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Basic Modal-->

  <!-- Basic Modal -->
  <div class="modal fade" id="terminalModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terminal Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="terminalForm">
          @csrf
          <input type="text" name="student_id" class="student_id">
          <input type="hidden" name="form" class="form">
          <input type="hidden" name="subject_id" class="subject_id">
          <input type="hidden" name="stream" class="stream">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number" max="100" min="0" name="terminal" id="" class="form-control">
            <span class="text-danger" id="terminal_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success termialbtn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Basic Modal-->
  <!-- Basic Modal -->
  <div class="modal fade" id="annualModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Annual Upload Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="annualForm">
          @csrf
          <input type="text" name="student_id" class="student_id">
          <input type="hidden" name="form" class="form">
          <input type="hidden" name="subject_id" class="subject_id">
          <input type="hidden" name="stream" class="stream">
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Test</label>
            <input type="number" max="100" min="0" name="annual" id="" class="form-control">
            <span class="text-danger" id="annual_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success annualbtn">Upload <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Basic Modal-->
<script>
        $(document).ready(function(){
            $("#hidden1").hide();
            $("#hidden2").hide();
            $("#hidden3").hide();
            $("#hidden4").hide();
            $("#hidden5").hide();
            $("#hidden6").hide();

            // paste student id to the modal
            $('.test1').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');
                // assign
                $('#student_id').val(student_id);
                $('#form').val(form);
                $('#stream').val(stream);
                $('#subject_id').val(subject_id);
                // console.log(stream);
            });
            $('.test2').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');

                $('.student_id').val(student_id);
                $('.form').val(form);
                $('.stream').val(stream);
                $('.subject_id').val(subject_id);

            });
            $('.midterm1').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');

                $('.student_id').val(student_id);
                $('.form').val(form);
                $('.stream').val(stream);
                $('.subject_id').val(subject_id);

            });
            $('.midterm2').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');

                $('.student_id').val(student_id);
                $('.form').val(form);
                $('.stream').val(stream);
                $('.subject_id').val(subject_id);

            });
            $('.terminal').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');

                $('.student_id').val(student_id);
                $('.form').val(form);
                $('.stream').val(stream);
                $('.subject_id').val(subject_id);

                // console.log(stream);
            });
            $('.annual').on('click',function(){
                var student_id = $(this).attr('data-id');
                var form = $(this).attr('data-form');
                var stream = $(this).attr('data-stream');
                var subject_id = $(this).attr('data-subject');

                $('.student_id').val(student_id);
                $('.form').val(form);
                $('.stream').val(stream);
                $('.subject_id').val(subject_id);

            });
            //
            $("#term").on('change',function(){
                var term = $("#term").val();
                if(term == 'term1'){
                    var url = '{{ route("GetOptions","term") }}';
                    url = url.replace('term',term);
                    $.ajax({
                    url: url,
                    type:"GET",
                    success:function(data){
                            if(data.success == true){
                                var option_data = data.data;
                                // console.log(option_data);
                                $("#options").html('<option>Choose Category</option>');
                                $.each(option_data,function(key,value){
                                    $('#options').append('<option value="'+value.exam_category+'">'+value.exam_category+'</option>');
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });

                }else if(term== 'term2'){
                    var url = '{{ route("GetOptions","term") }}';
                    url = url.replace('term',term);
                    $.ajax({
                    url: url,
                    type:"GET",
                    success:function(data){
                            if(data.success == true){
                                var option_data = data.data;
                                // console.log(option_data);
                                $("#options").html('<option>Choose Category</option>');
                                $.each(option_data,function(key,value){
                                    $('#options').append('<option value="'+value.exam_category+'">'+value.exam_category+'</option>');
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else{

                }


            });
// onchange of options
            $("#options").on('change',function(){
                var option = $("#options").val();
                // console.log(option);
                if(option == 'test1'){
                    $('#hidden1').show();
                    $('#hidden2').hide();
                    $('#hidden3').hide();
                    $('#hidden4').hide();
                    $('#hidden5').hide();
                    $('#hidden6').hide();

                }else if(option == 'test2'){
                    $('#hidden2').show();
                    $('#hidden1').hide();
                    $('#hidden3').hide();
                    $('#hidden4').hide();
                    $('#hidden5').hide();
                    $('#hidden6').hide();
                }else if(option == 'midterm1'){
                    $('#hidden3').show();
                    $('#hidden2').hide();
                    $('#hidden1').hide();
                    $('#hidden4').hide();
                    $('#hidden5').hide();
                    $('#hidden6').hide();
                }else if(option == 'midterm2'){
                    $('#hidden4').show();
                    $('#hidden2').hide();
                    $('#hidden3').hide();
                    $('#hidden1').hide();
                    $('#hidden5').hide();
                    $('#hidden6').hide();
                }else if(option == 'terminal'){
                    $('#hidden5').show();
                    $('#hidden2').hide();
                    $('#hidden3').hide();
                    $('#hidden4').hide();
                    $('#hidden1').hide();
                    $('#hidden6').hide();
                }else if(option == 'annual'){
                    $('#hidden6').show();
                    $('#hidden2').hide();
                    $('#hidden3').hide();
                    $('#hidden4').hide();
                    $('#hidden5').hide();
                    $('#hidden1').hide();
                }

            });

            // submit forms
            $('#test1Form').submit(function(e){
            e.preventDefault();//prevent auto submit

                var formData = $(this).serialize();
            // console.log(formData);

                            $.ajax({
                                url:"{{ route('Test1Upload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.test1btn').prop('disabled', true);
                                $('.test1btn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.test1btn').prop('disabled', false);
                                $('.test1btn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#testTerm1Modal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                      $("#testTerm1Modal").modal('hide');
                                        printErrorMsg(data.msg);
                                    }else{
                                        printValidationErrorMsg(data.msg);
                                    }
                                },
                            });
                        });
                        // test 2
            $('#test2Form').submit(function(e){
            e.preventDefault();//prevent auto submit

                var formData = $(this).serialize();
            // console.log(formData);

                            $.ajax({
                                url:"{{ route('Test2Upload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.test2btn').prop('disabled', true);
                                $('.test2btn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.test2btn').prop('disabled', false);
                                $('.test2btn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#testTerm2Modal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                        $("#testTerm2Modal").modal('hide');

                                        printErrorMsg(data.msg);
                                    }else{
                                        printValidationErrorMsg(data.msg);
                                    }
                                },
                            });
                        });
                        // midterm1 form submit

                        $('#midterm1Form').submit(function(e){
                            e.preventDefault();//prevent auto submit

                                var formData = $(this).serialize();
                            // console.log(formData);

                                            $.ajax({
                                url:"{{ route('midterm1Upload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.midterm1btn').prop('disabled', true);
                                $('.midterm1btn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.midterm1btn').prop('disabled', false);
                                $('.midterm1btn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#midTerm1Modal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                        $("#midTerm1Modal").modal('hide');
                                        printErrorMsg(data.msg);
                                    }else{
                                        printValidationErrorMsg(data.msg);
                                    }
                                },
                            });
                        });
                        // midterm2 submit
                        $('#midterm2Form').submit(function(e){
                            e.preventDefault();//prevent auto submit

                                var formData = $(this).serialize();
                            // console.log(formData);

                                            $.ajax({
                                url:"{{ route('midterm2Upload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.midterm2btn').prop('disabled', true);
                                $('.midterm2btn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.midterm2btn').prop('disabled', false);
                                $('.midterm2btn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#midTerm2Modal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                        $("#midTerm2Modal").modal('hide');
                                        printErrorMsg(data.msg);
                                    }else{
                                        printValidationErrorMsg(data.msg);
                                    }
                                },
                            });
                        });
                        // terminal submit form
                        $('#terminalForm').submit(function(e){
                            e.preventDefault();//prevent auto submit

                                var formData = $(this).serialize();
                            // console.log(formData);

                                            $.ajax({
                                url:"{{ route('terminalUpload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.terminalbtn').prop('disabled', true);
                                $('.terminalbtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.terminalbtn').prop('disabled', false);
                                $('.terminalbtn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#terminalModal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                        $("#terminalModal").modal('hide');
                                        printErrorMsg(data.msg);
                                    }else{
                                        printValidationErrorMsg(data.msg);
                                    }
                                },
                            });
                        });
                        // annual form submit
                        $('#annualForm').submit(function(e){
                            e.preventDefault();//prevent auto submit
                            var formData = $(this).serialize();
                            $.ajax({
                                url:"{{ route('annualUpload') }}",
                                data:formData,
                                type:"GET",
                                contentType: false,
                                processData:false,
                                beforeSend:function(){
                                $('.annualbtn').prop('disabled', true);
                                $('.annualbtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
                                },
                                complete:function(){
                                $('.annualbtn').prop('disabled', false);
                                $('.annualbtn').html('Upload <i class="bi bi-upload"></i>');
                                },
                                success:function(data){
                                    if(data.success == true){
                                        $("#annualModal").modal('hide');
                                        printSuccessMsg(data.msg);

                                    }else if(data.success == false){
                                        $("#annualModal").modal('hide');
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
                // document.getElementById('test1Form').close();
            }
            function printValidationErrorMsg(msg){
                    $.each(msg, function(field_name, error){
                        // console.log(field_name,error);
                        $(document).find('#'+field_name+'_error').text(error);
                    });
            }
        });
    </script>
@endsection
