@extends('layout/teacher-layout')
@section('main-part')
    <div class="card">
        <div class="card-header">
            Upload Result
            
        </div>
        <div class="card-body">
            <div class="table-responsive" >
            <table class="table table-bordered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Form</th>
                <th>Stream</th>
                <th>Subject Name</th>
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
                <td>{{ $data->subject_name }}</td>
                <td><a href="/academic/upload/result/{{$data->id}}" class="btn btn-success btn-sm">upload</a></td>
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
    
@endsection
