@extends('layout/academic-layout')
@section('main-part')
<div class="card">
    <div class="card-header">
        Uploaded Student Result
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
        <h5 class="heading"> Term 1 Test Results</h5>
        <div class="table-responsive">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Subject Name</th>
                <th>Marks</th>
              </tr>
            </thead>
            <tbody id="replaceable">
              @if(count($result_data)> 0)
              @foreach($result_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td>{{ $data->subject_name }}</td>
                <td>{{ $data->test_marks }}</td>
                <td><button class="btn btn-success btn-sm pull-right test1" data-id="{{$data->id}}" data-marks="{{$data->test_marks}}" data-bs-toggle="modal" data-bs-target="#EditTest1ResultModal">Edit <i class="bi bi-upload"></i> </button></td>
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
<div class="modal fade" id="EditTest1ResultModal" tabindex="-1">
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
<div class="modal fade" id="EditTest2ResultModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Term 2 Test Upload Form</h5>
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
    <div class="modal fade" id="EditMidterm1ResultModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Midterm Term 1 Edit Form</h5>
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
    <div class="modal fade" id="EditMidterm2ResultModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Midterm Term 2 Edit Form</h5>
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
    <div class="modal fade" id="EditTerminalResultModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terminal Edit Form</h5>
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
    <div class="modal fade" id="EditAnnualResultModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Annual Edit Form</h5>
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
  <script>
    $("#term").on('change',function(){
                var term = $("#term").val();
                if(term == 'term1'){
                    var url = '{{ route("GetOption","term") }}';
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
                    var url = '{{ route("GetOption","term") }}';
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
                var subject_id = "<?php echo $passed_subject_id; ?>";

                if(option == 'test1'){
                    var opt = option;
                    // console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $("#replaceable").html('<tbody></tbody>');
                                $(".heading").html('Term 1 Test Result');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.test_marks+'</td><td><button class="btn btn-success btn-sm pull-right test1" data-id="'+value.id+'" data-marks="'+value.test_marks+'" data-bs-toggle="modal" data-bs-target="#EditTest1ResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });

                }else if(option == 'test2'){
                    var opt = option;
                    // console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $("#replaceable").html('<tbody></tbody>');
                                $(".heading").html('Term 2 Test Result');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.test_marks+'</td><td><button class="btn btn-success btn-sm pull-right test2" id="test2" data-id="'+value.id+'" data-marks="'+value.test_marks+'" data-bs-toggle="modal" data-bs-target="#EditTest2ResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else if(option == 'midterm1'){
                    var opt = option;

                    console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $(".heading").html('Term 1 Midterm Result');
                                $("#replaceable").html('<tbody></tbody>');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.midterm_marks+'</td><td><button class="btn btn-success btn-sm pull-right midterm1" data-id="'+value.id+'" data-marks="'+value.midterm_marks+'" data-bs-toggle="modal" data-bs-target="#EditMidterm1ResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else if(option == 'midterm2'){
                    var opt = option;

                    console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $(".heading").html('Term 2 Midterm Result');
                                $("#replaceable").html('<tbody></tbody>');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.midterm_marks+'</td><td><button class="btn btn-success btn-sm pull-right midterm2" data-id="'+value.id+'" data-marks="'+value.midterm_marks+'" data-bs-toggle="modal" data-bs-target="#EditMidterm2ResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else if(option == 'terminal'){
                    var opt = option;

                    console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $(".heading").html('Terminal Result');
                                $("#replaceable").html('<tbody></tbody>');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.terminal_marks+'</td><td><button class="btn btn-success btn-sm pull-right terminal" data-id="'+value.id+'" data-marks="'+value.terminal_marks+'" data-bs-toggle="modal" data-bs-target="#EditTerminalResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else if(option == 'annual'){
                    var opt = option;

                    // console.log(opt);
                    $.ajax({
                    url: "{{ route('GetResults') }}",
                    type:"GET",
                    data: {subject_id:subject_id,option:opt},
                    success:function(data){
                            if(data.success == true){
                                var returned_data = data.data;
                                var count = 1;
                                // console.log(returned_data);
                                $(".heading").html('Annual Result');
                                $("#replaceable").html('<tbody></tbody>');
                                $.each(returned_data,function(key,value){
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.annual_marks+'</td><td><button class="btn btn-success btn-sm pull-right annual" data-id="'+value.id+'" data-marks="'+value.annual_marks+'" data-bs-toggle="modal" data-bs-target="#EditAnnualResultModal">Edit <i class="bi bi-upload"></i> </button></td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }

            });

            // paste marks on modal

            $(".test1").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);
            });
            $(".test2").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);

            });
            $(".midterm1").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);

            });
            $(".midterm2").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);

            });
            $(".terminal").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);

            });
            $(".annual").click(function(){
                var student_id = $(this).attr('data-id');
                var marks = $(this).attr('data-marks');
                console.log(marks);

            });
  </script>
@endsection
