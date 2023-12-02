<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FinanceInfo;
use App\Models\FinanceStaff;
use Illuminate\Http\Request;
use App\Models\StudentPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    public function loadHome(){
        $logged_user = Auth::user();
        $teacher_data = FinanceStaff::where('email',$logged_user->email)->first();
        $page_title = 'Home Page';
        return view('finance.home-page',compact('page_title'));
    }

    public function loadFinancialInfo(){
        $logged_user = Auth::user();
        $teacher_data = FinanceStaff::where('email',$logged_user->email)->first();
        $page_title = 'Financial Records';
        $finance_info = FinanceInfo::all();
        return view('finance.financial-info',compact('page_title','finance_info'));
    }

    public function RegisterFinanceInfo(Request $request){
          $validator = Validator::make($request->all(),[
            'payment_name' => 'required',
            'payment_amount' => 'required',
          ]);
    
          if($validator->fails()){
            return response()->json(['msg' => $validator->errors()->toArray()]);
          }else{
            try {
              $register = new FinanceInfo;
              $register->payment_name = $request->payment_name;
              $register->payment_amount = $request->payment_amount;
              $register->save();
              return response()->json(['success' => true, 'msg' => 'Financial Records registered successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
    
        }
      }
      }

      public function EditInfo(Request $request){

        $validator = Validator::make($request->all(),[
          'payment_name' => 'required',
          'payment_amount' => 'required',
        ]);
    
        if($validator->fails()){
          return response()->json(['msg' => $validator->errors()->toArray()]);
        }else{
          try {
            $update_teacher = FinanceInfo::where('id',$request->send_id)->update([
              'payment_name' => $request->payment_name,
              'payment_amount' => $request->payment_amount,
            ]);
            return response()->json(['success' => true, 'msg' => 'Finacial Records Updated Successfully']);
          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
        }
      }
      
    public function loadAllStudents(){
        $logged_user = Auth::user();
        $teacher_data = FinanceStaff::where('email',$logged_user->email)->first();
        $page_title = 'Students Financial Records';
        $student_data = Student::all();
        return view('finance.all-students',compact('page_title','student_data'));
    }

    public function loadStudentsFinancialDetails($id){
        $logged_user = Auth::user();
        $teacher_data = FinanceStaff::where('email',$logged_user->email)->first();
        $page_title = 'Student Financial Records';
        $student_data = Student::where('id',$id)->first();
        $fee_info = FinanceInfo::first();
        $check_1st = StudentPayment::where([['student_id',$id],['installment',1]])->first();
        $check_2nd = StudentPayment::where([['student_id',$id],['installment',2]])->first();
        $check_3rd = StudentPayment::where([['student_id',$id],['installment',3]])->first();
        $check_4th = StudentPayment::where([['student_id',$id],['installment',4]])->first();
        return view('finance.students-financial-deatils',compact('page_title','check_2nd','check_1st','check_3rd','check_4th','student_data','fee_info'));
    }

    public function InstallmentOne(Request $request){
        $request->validate([
            'installment_one' => 'required',
        ]);
        try {
            $payment = new StudentPayment;
            $payment->student_id = $request->student_id;
            $payment->fee_paid = $request->installment_one;
            $payment->installment = $request->installment_no;
            $payment->save();
            return redirect('/all/students')->with('success', 'First Installment Payment Was Successfully');
        } catch (\Exception $e) {
            return redirect('/all/students')->with('fail', $e->getMessage());
        }

    }

    public function InstallmentTwo(Request $request){
        $request->validate([
            'installment_two' => 'required',
        ]);
        try {
            $payment = new StudentPayment;
            $payment->student_id = $request->student_id;
            $payment->fee_paid = $request->installment_two;
            $payment->installment = $request->installment_no;
            $payment->save();
            return redirect('/all/students')->with('success', 'Second Installment Payment Was Successfully');
        } catch (\Exception $e) {
            return redirect('/all/students')->with('fail', $e->getMessage());
        }
    }

    public function InstallmentThree(Request $request){
        $request->validate([
            'installment_three' => 'required',
        ]);
        try {
            $payment = new StudentPayment;
            $payment->student_id = $request->student_id;
            $payment->fee_paid = $request->installment_three;
            $payment->installment = $request->installment_no;
            $payment->save();
            return redirect('/all/students')->with('success', 'Third Installment Payment Was Successfully');
        } catch (\Exception $e) {
            return redirect('/all/students')->with('fail', $e->getMessage());
        }
    }

    public function InstallmentFour(Request $request){
        $request->validate([
            'installment_four' => 'required',
        ]);
        try {
            $payment = new StudentPayment;
            $payment->student_id = $request->student_id;
            $payment->fee_paid = $request->installment_four;
            $payment->installment = $request->installment_no;
            $payment->save();
            return redirect('/all/students')->with('success', 'Fourth Installment Payment Was Successfully');
        } catch (\Exception $e) {
            return redirect('/all/students')->with('fail', $e->getMessage());
        }
    }
}
