@extends('layout/parent-layout')
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
        Student's Financial Records
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Student Name</th>
                <th>Registration #</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($student_data)> 0)
              @foreach($student_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                <td>{{ $data->registration_number }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td>{{ $data->category ?? '-' }}</td>
                <td><a href="/students/financial/detail/{{$data->id}}" class="btn btn-primary btn-sm">view</a></td>
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