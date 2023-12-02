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
        Manage Subjects
        <a href="/register/subject" class="btn btn-success btn-sm pull-right">Add New <i class="bi bi-book-full"></i> </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Subject Name</th>
                <th>Registration Date</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($subject_data)> 0)
              @foreach($subject_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->subject_name }}</td>
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
@endsection
