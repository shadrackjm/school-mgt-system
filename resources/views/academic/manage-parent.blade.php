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
        <a href="/register/parent" class="btn btn-success btn-sm pull-right">Add New <i class="bi bi-person-plus-fill"></i> </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Parent Name</th>
                <th colspan="2">contact</th>
                <th>Student Name</th>
                <th>Registration #</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($parent_data)> 0)
              @foreach($parent_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->fname}} {{ $data->mname}} {{ $data->lname}}</td>
                <td>{{$data->email }}</td>
                <td>{{$data->phone_number }}</td>
                <td>{{ $data->firstname}} {{ $data->middlename}} {{ $data->lastname}}</td>
                <td>{{ $data->registration_number }}</td>
                <td><a href="/edit/parent/{{$data->id}}"><i class="bi bi-eyedropper"></i> </a>  </td>
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
