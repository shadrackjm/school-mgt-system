@extends('layout/teacher-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
  <div class="card-header">
     School - Session TimeTable

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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'monday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'monday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'monday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'monday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'monday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'monday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'monday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'tuesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'tuesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'tuesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'wednesday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'wednesday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'wednesday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'thursday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'thursday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'thursday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'thursday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'thursday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form1->stream == 'B')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'B' && $data->day == 'friday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'C')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'C' && $data->day == 'friday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
          @endif
          @endforeach
          @endif
          @if($form1->stream == 'D')
          @foreach($timetable_data as $data)
          @if($data->form == 'I'  && $data->stream == 'D' && $data->day == 'friday')
          <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'B')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'B' && $data->day == 'friday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'C')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'C' && $data->day == 'friday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
                @endif
              @endforeach
            @endif
            @if($form2->stream == 'D')
              @foreach($timetable_data as $data)
                @if($data->form == 'II'  && $data->stream == 'D' && $data->day == 'friday')
                  <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form3->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'III'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form4->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'IV'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form5->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'V'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'B')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'B' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'C')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'C' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
              @endif
            @endforeach
          @endif
          @if($form6->stream == 'D')
            @foreach($timetable_data as $data)
              @if($data->form == 'VI'  && $data->stream == 'D' && $data->day == 'friday')
                <td>{{$data->subject_name}} <br> {{$data->time}} </td>
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

@endsection
