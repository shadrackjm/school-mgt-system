@extends('layout/parent-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
  <div class="card">
    <div class="card-header">
        Student attendance History
        <input type="text" name="" id="search" class="mx-2 pull-right">

    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-sm text-center" id="tb1">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration number</th>
                <th>Attendance</th>
              </tr>
            </thead>
            <tbody id="table">
                @foreach($student_data as $data)
                <tr>
                    <td>{{ date("l", strtotime($data->created_at)) }} - {{ date("d/m/Y", strtotime($data->created_at)) }}</td>
                    <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                    <td>{{ $data->registration_number }}</td>
                        @if($data->attendance == 1)
                        <td><span class="badge bg-success">Present</span></td>
                        @elseif($data->attendance == 2)
                        <td><span class="badge bg-danger">Absent</span></td>
                        @elseif($data->attendance == 3)
                        <td><span class="badge bg-warning">Permission</span></td>
                        @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </div>
  <script>
 
  $('#search').on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
  </script>
@endsection
