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
        Manage students
        <a href="/register/student" class="btn btn-success btn-sm pull-right">Add New <i class="bi bi-person-plus-fill"></i> </a>
        <a href="/import/students/form" class="btn btn-success btn-sm pull-right">Import Excel <i class="bi bi-file-excel-fill"></i> </a>
    </div>
    <div class="card-body">
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
                <td><a href="/edit/student/{{$data->id}}"><i class="bi bi-eyedropper"></i> </a>  </td>
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
