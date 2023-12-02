@extends('layout/academic-layout')
@section('main-part')
<div class="card">
  <div class="card-header">
    Add new subject
  </div>
  <div class="card-body">
      <form class="" action="{{ route('RegisterSubject') }}" method="post">
        @csrf
        <!-- prevent cross site request forgery -->
        <div class="form-group my-2">
          <label for="">Subject Name</label>
          <input type="text" name="subject_name" class="form-control">
          <span class="text-danger">@error('subject_name'){{$message}} @enderror</span>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm">Register <i class="bi bi-save"></i> </button>
      </form>
  </div>
</div>
@endsection
