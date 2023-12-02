@extends('layout/academic-layout')
@section('main-part')
<div class="card">
  <div class="card-header">
    Import Students' Excel file
  </div>
  <div class="card-body">
      <form class="" action="{{ route('ImportStudent') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- prevent cross site request forgery -->
        <div class="form-group my-2">
          <label for="">Excel File</label>
          <input type="file" name="excel_file" class="form-control">
          <span class="text-danger">@error('excel_file'){{$message}} @enderror</span>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm">Import <i class="bi bi-save"></i> </button>
      </form>
  </div>
</div>
@endsection
