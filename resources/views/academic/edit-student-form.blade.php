@extends('layout/academic-layout')
@section('main-part')
<div class="card">
  <div class="card-header">
    Edit student
  </div>
  <div class="card-body">
      <form class="" action="{{ route('EditStudent') }}" method="post">
        @csrf
        <!-- prevent cross site request forgery -->
        <div class="form-group">
          <label for="">Registration Number</label>
          <input type="text" name="registration_number" class="form-control" value="{{$student_data->registration_number}}" readonly>
          <span class="text-danger">@error('registration_number'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">First Name</label>
          <input type="text" name="fname" class="form-control" value="{{$student_data->firstname}}">
          <span class="text-danger">@error('fname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Middle Name</label>
          <input type="text" name="mname" class="form-control" value="{{$student_data->middlename}}">
          <span class="text-danger">@error('mname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Last Name</label>
          <input type="text" name="lname" class="form-control" value="{{$student_data->lastname}}">
          <span class="text-danger">@error('mname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Form</label>
          <select class="form-select" name="form">
            <option value="{{$student_data->form}}">Form {{$student_data->form}}</option>
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
          <label for="">Category</label>
          <select class="form-select" name="category">
            <option value="{{$student_data->category}}">{{$student_data->category}}</option>
            <option value="Arts">Arts</option>
            <option value="Science">Science</option>
            <option value="Business">Business</option>
          </select>
          <span class="text-danger">@error('category'){{$message}} @enderror</span>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm">Register <i class="bi bi-save"></i> </button>
      </form>
  </div>
</div>
@endsection
