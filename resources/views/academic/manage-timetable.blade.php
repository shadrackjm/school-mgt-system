@extends('layout/academic-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
  <div class="card-header">
    Manage School - Session TimeTable
    <button class="btn btn-success btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#timetableModal">Add TimeTable Session <i class="bi bi-person-plus-fill"></i> </button>

  </div>
  <div class="card-body">
    <small class="text-success">Note: 10:20 - 11:00 AM break Time!</small>
    <div class="table-responsive">
      <table class="table table-bordered table-sm text-center">
        <tr>
          <th></th>
          <th>Form</th>
          <th>Stream</th>
          <th colspan="{{count($stream) + 6}}">Sessions</th>
        </tr>
        <!-- Monday -->
        <tr>
          <th rowspan="{{count($stream) + 6}}">Monday</th>
          <th rowspan="{{count($stream1_data) + 1}}">I</th>
        </tr>
        @foreach($stream1_data as $form1)
        <tr>
          <th>{{$form1->stream}}</th>
          @if($form1->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'I'  && $data->stream == 'A' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'monday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'monday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'monday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream2_data) + 1}}">II</th>
        </tr>
        @foreach($stream2_data as $form2)
        <tr>
          <th>{{$form2->stream}}</th>
            @if($form2->stream == 'A')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'A' && $data->day == 'monday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'monday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'monday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'monday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream3_data) + 1}}">III</th>
        </tr>
        @foreach($stream3_data as $form3)
        <tr>
          <th>{{$form3->stream}}</th>
          @if($form3->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'A' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream4_data) + 1}}">IV</th>
        </tr>
        @foreach($stream4_data as $form4)
        <tr>
          <th>{{$form4->stream}}</th>
          @if($form4->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'A' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream5_data) + 1}}">V</th>
        </tr>
        @foreach($stream5_data as $form5)
        <tr>
          <th>{{$form5->stream}}</th>
          @if($form5->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'A' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream6_data) + 1}}">VI</th>
        </tr>
        @foreach($stream6_data as $form6)
        <tr>
          <th>{{$form6->stream}}</th>
          @if($form6->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'A' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <!-- End Monday -->
        <!-- Start Tuesday -->
        <tr>
          <th rowspan="{{count($stream) + 6}}">Tuesday</th>
          <th rowspan="{{count($stream1_data) + 1}}">I</th>
        </tr>
        @foreach($stream1_data as $form1)
        <tr>
          <th>{{$form1->stream}}</th>
          @if($form1->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'I'  && $data->stream == 'A' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream2_data) + 1}}">II</th>
        </tr>
        @foreach($stream2_data as $form2)
        <tr>
          <th>{{$form2->stream}}</th>
            @if($form2->stream == 'A')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'A' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream3_data) + 1}}">III</th>
        </tr>
        @foreach($stream3_data as $form3)
        <tr>
          <th>{{$form3->stream}}</th>
          @if($form3->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'A' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream4_data) + 1}}">IV</th>
        </tr>
        @foreach($stream4_data as $form4)
        <tr>
          <th>{{$form4->stream}}</th>
          @if($form4->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'A' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream5_data) + 1}}">V</th>
        </tr>
        @foreach($stream5_data as $form5)
        <tr>
          <th>{{$form5->stream}}</th>
          @if($form5->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'A' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream6_data) + 1}}">VI</th>
        </tr>
        @foreach($stream6_data as $form6)
        <tr>
          <th>{{$form6->stream}}</th>
          @if($form6->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'A' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <!-- End Tuesday -->
        <!-- Start Wednesday -->
        <tr>
          <th rowspan="{{count($stream) + 6}}">Wednesday</th>
          <th rowspan="{{count($stream1_data) + 1}}">I</th>
        </tr>
        @foreach($stream1_data as $form1)
        <tr>
          <th>{{$form1->stream}}</th>
          @if($form1->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'I'  && $data->stream == 'A' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream2_data) + 1}}">II</th>
        </tr>
        @foreach($stream2_data as $form2)
        <tr>
          <th>{{$form2->stream}}</th>
            @if($form2->stream == 'A')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'A' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream3_data) + 1}}">III</th>
        </tr>
        @foreach($stream3_data as $form3)
        <tr>
          <th>{{$form3->stream}}</th>
          @if($form3->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'A' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream4_data) + 1}}">IV</th>
        </tr>
        @foreach($stream4_data as $form4)
        <tr>
          <th>{{$form4->stream}}</th>
          @if($form4->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'A' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream5_data) + 1}}">V</th>
        </tr>
        @foreach($stream5_data as $form5)
        <tr>
          <th>{{$form5->stream}}</th>
          @if($form5->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'A' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream6_data) + 1}}">VI</th>
        </tr>
        @foreach($stream6_data as $form6)
        <tr>
          <th>{{$form6->stream}}</th>
          @if($form6->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'A' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <!-- End Wednesday -->
        <!-- Start Thursday -->
        <tr>
          <th rowspan="{{count($stream) + 6}}">Thursday</th>
          <th rowspan="{{count($stream1_data) + 1}}">I</th>
        </tr>
        @foreach($stream1_data as $form1)
        <tr>
          <th>{{$form1->stream}}</th>
          @if($form1->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'I'  && $data->stream == 'A' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'thursday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'thursday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'thursday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream2_data) + 1}}">II</th>
        </tr>
        @foreach($stream2_data as $form2)
        <tr>
          <th>{{$form2->stream}}</th>
            @if($form2->stream == 'A')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'A' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream3_data) + 1}}">III</th>
        </tr>
        @foreach($stream3_data as $form3)
        <tr>
          <th>{{$form3->stream}}</th>
          @if($form3->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'A' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream4_data) + 1}}">IV</th>
        </tr>
        @foreach($stream4_data as $form4)
        <tr>
          <th>{{$form4->stream}}</th>
          @if($form4->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'A' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream5_data) + 1}}">V</th>
        </tr>
        @foreach($stream5_data as $form5)
        <tr>
          <th>{{$form5->stream}}</th>
          @if($form5->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'A' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream6_data) + 1}}">VI</th>
        </tr>
        @foreach($stream6_data as $form6)
        <tr>
          <th>{{$form6->stream}}</th>
          @if($form6->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'A' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <!-- End Thursday -->
                <!-- Start Friday -->
        <tr>
          <th rowspan="{{count($stream) + 6}}">Friday</th>
          <th rowspan="{{count($stream1_data) + 1}}">I</th>
        </tr>
        @foreach($stream1_data as $form1)
        <tr>
          <th>{{$form1->stream}}</th>
          @if($form1->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'I'  && $data->stream == 'A' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'friday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'friday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'friday')
          <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
          @endif
          @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream2_data) + 1}}">II</th>
        </tr>
        @foreach($stream2_data as $form2)
        <tr>
          <th>{{$form2->stream}}</th>
            @if($form2->stream == 'A')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'A' && $data->day == 'friday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'friday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'friday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'friday')
                  <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
                @endif
              @endforeach
            @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream3_data) + 1}}">III</th>
        </tr>
        @foreach($stream3_data as $form3)
        <tr>
          <th>{{$form3->stream}}</th>
          @if($form3->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'A' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream4_data) + 1}}">IV</th>
        </tr>
        @foreach($stream4_data as $form4)
        <tr>
          <th>{{$form4->stream}}</th>
          @if($form4->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'A' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream5_data) + 1}}">V</th>
        </tr>
        @foreach($stream5_data as $form5)
        <tr>
          <th>{{$form5->stream}}</th>
          @if($form5->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'A' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <tr>
          <th rowspan="{{count($stream6_data) + 1}}">VI</th>
        </tr>
        @foreach($stream6_data as $form6)
        <tr>
          <th>{{$form6->stream}}</th>
          @if($form6->stream == 'A')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'A' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} | {{$data->time}} <br>{{$data->firstname}} {{$data->middlename}} {{$data->lastname}}</td>
              @endif
            @endforeach
          @endif
        </tr>
        @endforeach
        <!-- End Friday -->
      </table>
    </div>
  </div>
</div>
<!-- Basic Modal -->
<div class="modal fade" id="timetableModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Permission Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="TimetableForm">
          @csrf
          <div class="form-group my-2">
            <label for="">Subject</label>
            <select class="form-select" name="subject_id" id="subject_id">
              <option value="">Choose Subject</option>
              @foreach($subject_data as $data)
              <option value="{{$data->id}}">{{$data->subject_name}}</option>
              @endforeach
            </select>
            <span class="text-danger" id="subject_id_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Form</label>
            <select class="form-select" name="form_id" id="form_id">
              <option value="">Choose Form</option>
              @foreach($form_data as $data)
              <option value="{{$data->id}}">{{$data->form}}</option>
              @endforeach
            </select>
            <span class="text-danger" id="form_id_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Stream</label>
            <select class="form-select" name="stream" id="stream_id">
            </select>
            <span class="text-danger" id="stream_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Day</label>
            <select class="form-select" name="day" id="">
              <option value="">Choose Week Day</option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
            </select>
            <span class="text-danger" id="day_error"></span>
          </div>
          <div class="form-group my-2">
            <label for="">Time</label>
            <input type="text" class="form-control" name="time">
            <span class="text-danger" id="time_error"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-success request">Add TimeTable <i class="bi bi-save"></i> </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function(){

  $('#form_id').on('change',function(){
    var form_id = $(this).val();
    console.log(form_id);
    var url = '{{ route("getStreamData","form_id") }}';
    url = url.replace('form_id',form_id);

    $.ajax({
      url:url,
      type:"GET",
      contentType: false,
      processData:false,
      success:function(data){
        if(data.success == true){
          var stream_data = data.data;
          console.log(stream_data);
          $('#stream_id').html('<option>Choose Stream</option>');

          $.each(stream_data,function(key,value){
            $('#stream_id').append('<option value="'+value.stream+'">'+value.stream+'</option>');
          });

        }else{
          console.log(data.msg);
        }
      },
    });
  });


  $('#TimetableForm').submit(function(e){
    e.preventDefault();//prevent auto submit

    var formData = $(this).serialize();
    console.log(formData);

    $.ajax({
      url:"{{ route('CreateTimetable') }}",
      data:formData,
      type:"GET",
      contentType: false,
      processData:false,
      beforeSend:function(){
        $('.request').prop('disabled', true);
        $('.request').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
      },
      complete:function(){
        $('.request').prop('disabled', false);
        $('.request').html('Add TimeTable <i class="bi bi-save"></i>');
      },
      success:function(data){
        if(data.success == true){
          //   console.log(data.msg);
          $("#timetableModal").modal('hide');
            location.reload();
          printSuccessMsg(data.msg);

        }else if(data.success == false){
          //   console.log(data.msg);
          $("#timetableModal").modal('hide');
          printErrorMsg(data.msg);
        }else{
          // console.log(data);
          printValidationErrorMsg(data.msg);
        }
      },
    });


  });
});

function printErrorMsg(msg){
  $('#alert-danger').html('');
  $('#alert-danger').css('display','block');
  $('#alert-danger').append(''+msg+'');
}
function printSuccessMsg(msg){
  $('#alert-success').html('');
  $('#alert-success').css('display','block');
  $('#alert-success').append(''+msg+'');
  // document.getElementById('AssignSupervisor').close();
}
function printValidationErrorMsg(msg){
  $.each(msg, function(field_name, error){
    console.log(field_name,error);
    $(document).find('#'+field_name+'_error').text(error);
  });
}
</script>
@endsection
