@extends('layout/academic-layout')
@section('main-part')
<div class="card">
  <div class="card-header">
    Assign Teacher - subject
    <a href="/teacher/subject" class="btn btn-secondary btn-sm mx-2">Manage Records</a>
  </div>
  <div class="card-body">
      <form class="" action="{{ route('AssignSubject') }}" method="post">
        @csrf
        <!-- prevent cross site request forgery -->
        <div class="form-group my-2">
          <label for="">Subject Name</label>
          <select class="form-select" name="subject_name">
            <option value="">Choose Subject</option>
            @foreach($subject_data as $data)
            <option value="{{$data->id}}">{{$data->subject_name}}</option>
            @endforeach
          </select>
          <span class="text-danger">@error('subject_name'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Teacher`s Name</label>
          <select class="form-select" name="teacher_name">
            <option value="">Choose Teacher Name</option>
            @foreach($teacher_data as $data)
            <option value="{{$data->id}}">{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</option>
            @endforeach
          </select>
          <span class="text-danger">@error('teacher_name'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Form</label>
          <select class="form-select" name="form">
            <option value="">Choose Form</option>
            <option value="I">Form I</option>
            <option value="II">Form II</option>
            <option value="III">Form III</option>
            <option value="IV">Form IV</option>
            <option value="V">Form V</option>
            <option value="VI">Form VI</option>
          </select>
          <span class="text-danger">@error('form'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Stream</label>
          <select class="form-select" name="stream" id="stream">
            <option value="">Choose Stream</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="F">E</option>
            <option value="F">F</option>
          </select>
          <span class="text-danger">@error('stream'){{$message}} @enderror</span>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm">Assign <i class="bi bi-save"></i> </button>
      </form>
  </div>
</div>
@endsection
