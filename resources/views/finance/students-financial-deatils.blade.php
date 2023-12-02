@extends('layout/finance-layout')
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
                <form action="{{ route('InstallmentOne')}}" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label>
                        <input type="hidden" name="installment_no" value="1">
                        <input type="hidden" name="student_id" value="{{$student_data->id}}">
                        <input type="number" name="installment_one" class="form-control" min="{{$fee_info->payment_amount/4 }}" max="{{$fee_info->payment_amount/4 }}" placeholder="Enter Payment Amount">
                        <span class="text-danger">@error('installment_one'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                    <hr> <h6><b>status:</b> <i>PAID</i></h6>
                    <h6><b>at:</b> <i>{{$check_1st->created_at}}</i></h6>
                    </div>
                @endif
            </div>
            <div class="col">
                @if ($check_2nd == null)
                <form action="{{ route('InstallmentTwo')}}" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label>
                        <input type="hidden" name="installment_no" value="2">
                        <input type="hidden" name="student_id" value="{{$student_data->id}}">
                        <input type="number" name="installment_two" class="form-control" min="{{$fee_info->payment_amount/4 }}" max="{{$fee_info->payment_amount/4 }}" placeholder="Enter Payment Amount">
                        <span class="text-danger">@error('installment_two'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i>PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_2nd->created_at}}</i></h6>
                    </div>
                @endif
            </div>
        </div><hr>
        <div class="row">
            <h5 class="card-title">Term 2 Payments Details</h5>
            <div class="col">
                @if ($check_3rd == null)
                <form action="{{ route('InstallmentTwo')}}" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label>
                        <input type="hidden" name="installment_no" value="3">
                        <input type="hidden" name="student_id" value="{{$student_data->id}}">
                        <input type="number" name="installment_three" class="form-control" min="{{$fee_info->payment_amount/4 }}" max="{{$fee_info->payment_amount/4 }}" placeholder="Enter Payment Amount">
                        <span class="text-danger">@error('installment_three'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">1<sup>st</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i>PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_3rd->created_at}}</i></h6>
                    </div>
                @endif
            </div>
            <div class="col">
                @if ($check_4th == null)
                <form action="{{ route('InstallmentFour')}}" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label>
                        <input type="hidden" name="installment_no" value="4">
                        <input type="hidden" name="student_id" value="{{$student_data->id}}">
                        <input type="number" name="installment_four" class="form-control" min="{{$fee_info->payment_amount/4 }}" max="{{$fee_info->payment_amount/4 }}" placeholder="Enter Payment Amount">
                        <span class="text-danger">@error('installment_four'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
                @else
                    <div style="background-color: #E0E0E0; padding: 10px">
                    <label for="">2<sup>nd</sup> Installement fee - {{$fee_info->payment_amount/4 }}</label><br>
                       <hr> <h6><b>status:</b> <i>PAID</i></h6>
                        <h6><b>at:</b> <i>{{$check_4th->created_at}}</i></h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection