@extends('layout/parent-layout')
@section('main-part')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
    <div class="card-header"> {{$student_data->firstname}}'s Financial Details | {{ date('d/m/Y')}}</div>
    <div class="card-body">
        
        <div class="row">
            <h5 class="card-title">Term 1 Payments Details</h5>
            <div class="col">
                @if ($check_1st == null)
                <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                    <hr> <h6><b>status:</b> <i class="text-danger">NOT PAID</i></h6>
                    </div>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                    <hr> <h6><b>status:</b> <i class="text-success">PAID</i></h6>
                    <h6><b>at:</b> <i>{{$check_1st->created_at}}</i></h6>
                    </div>
                @endif
            </div>
            <div class="col">
                @if ($check_2nd == null)
                <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-danger"> NOT PAID</i></h6>
                    </div>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-success">PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_2nd->created_at}}</i></h6>
                    </div>
                @endif
            </div>
        </div><hr>
        <div class="row">
            <h5 class="card-title">Term 2 Payments Details</h5>
            <div class="col">
                @if ($check_3rd == null)
                <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-danger">NOT PAID</i></h6>
                    </div>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-success">PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_3rd->created_at}}</i></h6>
                    </div>
                @endif
            </div>
            <div class="col">
                @if ($check_4th == null)
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-danger">NOT PAID</i></h6>
                    </div>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i class="text-success">PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_4th->created_at}}</i></h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection