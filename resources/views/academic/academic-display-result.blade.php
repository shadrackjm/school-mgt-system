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
  <script>
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
                                console.log(option_data);
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
                                console.log(option_data);
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
                   

                }else if(option == 'test2'){
                    var opt = option;
                   
                    // console.log(opt);
                    $.ajax({
                    url: "{{ route('Getresults') }}",
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
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.test_marks+'</td></tr>');
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
                    url: "{{ route('Getresults') }}",
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
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.midterm_marks+'</td></tr>');
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
                    url: "{{ route('Getresults') }}",
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
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.midterm_marks+'</td></tr>');
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
                    url: "{{ route('Getresults') }}",
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
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.terminal_marks+'</td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }else if(option == 'annual'){
                    var opt = option;
                   
                    console.log(opt);
                    $.ajax({
                    url: "{{ route('Getresults') }}",
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
                                    $('#replaceable').append('<tr><td>'+count+'</td><td>'+value.firstname+' '+value.middlename+' '+value.lastname+'</td><td>'+value.form+'</td><td>'+value.stream+'</td><td>'+value.registration_number+'</td><td>'+value.subject_name+'</td><td>'+value.annual_marks+'</td></tr>');
                                    count = count + 1;
                                });
                            }else{
                                alert(data.msg);
                            }
                        }
                    });
                }

            });
  </script>
@endsection