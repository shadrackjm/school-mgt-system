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
      <div class="card-title">Upload Holiday Package</div>
    </div>
    <div class="card-body">
    <form action="{{ route('UploadHoliday') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Upload Package</label>
            <input type="file" name="package" id="" class="form-control" value="{{ old('package')}}">
          <span class="text-danger">@error('package'){{$message}} @enderror</span>
            <!-- <span class="text-danger" id="package_error"></span> -->
          </div>
          <div class="form-group my-2">
            <label for="">Subject Name</label>
            <select name="subject_id" id="" class="form-select">
                <option value="">Choose Subject</option>
                @foreach($subject_data as $data)
                    <option value="{{ $data->id}}">{{ $data->subject_name}} {{ $data->form}} {{ $data->stream}}</option>
                @endforeach
            </select>
          <span class="text-danger">@error('subject_id'){{$message}} @enderror</span>
            <!-- <span class="text-danger" id="subject_id_error"></span> -->
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="button" class="btn btn-success upload">Upload <i class="bi bi-upload"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
</div>
@endsection