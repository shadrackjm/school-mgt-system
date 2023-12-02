@extends('layout/academic-layout')
@section('main-part')
<div class="card">
  <div class="card-header">
    Edit Parent
  </div>
  <div class="card-body">
      <form class="" action="{{ route('EditParent') }}" method="post">
        @csrf
        <!-- prevent cross site request forgery -->
        <div class="form-group">
          <label for="">Registration Number</label>
          <input type="text" name="registration_number" class="form-control" value="{{$student_data->registration_number}}" readonly>
          <span class="text-danger">@error('registration_number'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">First Name</label>
          <input type="text" name="fname" class="form-control" value="{{$parent_data->fname}}">
          <span class="text-danger">@error('fname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Middle Name</label>
          <input type="text" name="mname" class="form-control" value="{{$parent_data->mname}}">
          <span class="text-danger">@error('mname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Last Name</label>
          <input type="text" name="lname" class="form-control" value="{{$parent_data->lname}}">
          <span class="text-danger">@error('lname'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" value="{{$parent_data->email}}">
          <span class="text-danger">@error('email'){{$message}} @enderror</span>
        </div>
        <div class="form-group my-2">
          <label for="">Phone Number</label>
          <input type="text" name="phone" class="form-control" value="{{$parent_data->phone_number}}">
          <span class="text-danger">@error('phone'){{$message}} @enderror</span>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm">Register <i class="bi bi-save"></i> </button>
      </form>
  </div>
</div>
@endsection
