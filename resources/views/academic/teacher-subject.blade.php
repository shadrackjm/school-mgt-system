@extends('layout/academic-layout')
@section('main-part')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
  <div class="card">
    <div class="card-header">
        Manage Teacher - Subject Details
        <a href="/assign/subject" class="btn btn-success btn-sm float-right">Assign  <i class="bi bi-book-half"></i> </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Teacher`s Name</th>
                <th>Subject Name</th>
                <th>Form</th>
                <th>Stream</th>
                <th>un-assign</th>
              </tr>
            </thead>
            <tbody>
              @if(count($teacher_subject_data)> 0)
              @foreach($teacher_subject_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                <td>{{ $data->subject_name }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td><a href="/unassign/subject/{{$data->id}}" onclick="return confirm('Are you sure You want to un-assign?')"><i class="bi bi-trash-fill"></i></a> </td>
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
@endsection
