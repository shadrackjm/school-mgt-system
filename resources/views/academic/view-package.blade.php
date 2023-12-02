@extends('layout/academic-layout')
@section('main-part')
  <div class="card">
    <div class="card-header">
         Holiday Packages
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
                <td><a href="/view/packages/{{$data->id}}" target="_blank" class="btn btn-primary btn-sm">view</a></td>
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
