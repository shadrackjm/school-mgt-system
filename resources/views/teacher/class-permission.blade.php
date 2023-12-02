@extends('layout/teacher-layout')
@section('main-part')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
  <div class="card">
    <div class="card-header">
       Assigned Class List
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($teacher_subject_data)> 0)
              @foreach($teacher_subject_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td><a href="/student/permission/{{$data->form}}/{{$data->stream}}" class="btn btn-success btn-sm">student list</a></td>
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
