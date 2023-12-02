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
        Manage Holiday Packages
        <!-- <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#uploadModal">Request <i class="bi bi-person-plus-fill"></i> </button> -->
    <a href="/form/package" class="btn btn-success btn-sm">upload</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Subject Name</th>
                <th>Upload Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($package_data)> 0)
              @foreach($package_data as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->form }}</td>
                <td>{{ $data->stream }}</td>
                <td>{{ $data->subject_name }}</td>
                <td>{{ $data->created_at }}</td>
                <td><a href="/delete/package/{{$data->id}}" class="btn btn-danger btn-sm">delete</a></td>
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
