<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use App\Models\FinanceInfo;
use Illuminate\Http\Request;
use App\Models\ParentStudent;
use App\Models\StudentPayment;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function loadHomePage(){
        $page_title = 'Parent Home';
        $user = Auth::user();
        $parent_data = Parents::where('email',$user->email)->first();
        $student_data = ParentStudent::join('students','students.id','=','parent_students.student_id')
            ->join('parents','parents.id','=','parent_students.parent_id')
            ->where('parent_students.parent_id',$parent_data->id)
            ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.category']);
        return view('parent.home',compact('page_title','parent_data','student_data'));
    }

    public function loadPaymentDetails(){
        $page_title = 'Students Financial Details Home';
        $user = Auth::user();
        $parent_data = Parents::where('email',$user->email)->first();
        $student_data = ParentStudent::join('students','students.id','=','parent_students.student_id')
            ->join('parents','parents.id','=','parent_students.parent_id')
            ->where('parent_students.parent_id',$parent_data->id)
            ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.category']);
        return view('parent.payment-record',compact('page_title','parent_data','student_data'));
    }

    public function loadStudentPaymentDetails($id){
        $logged_user = Auth::user();
        $parent_data = Parents::where('email',$logged_user->email)->first();
        $page_title = 'Student Financial Records';
        $student_data = Student::where('id',$id)->first();
        $fee_info = FinanceInfo::first();
        $check_1st = StudentPayment::where([['student_id',$id],['installment',1]])->first();
        $check_2nd = StudentPayment::where([['student_id',$id],['installment',2]])->first();
        $check_3rd = StudentPayment::where([['student_id',$id],['installment',3]])->first();
        $check_4th = StudentPayment::where([['student_id',$id],['installment',4]])->first();
        return view('parent.students-financial-deatils',compact('page_title','check_2nd','check_1st','check_3rd','check_4th','student_data','fee_info'));
    }

    public function loadAttendanceRecords(){
        $current_year = date('Y');
        $logged_user = Auth::user();
        $parent_data = Parents::where('email',$logged_user->email)->first();
        $page_title = 'Attendance History';
         $student_data = ParentStudent::join('students','students.id','=','parent_students.student_id')
            ->join('parents','parents.id','=','parent_students.parent_id')
            ->join('attendances','attendances.student_id','=','parent_students.student_id')
            ->where('parent_students.parent_id',$parent_data->id)
            ->whereYear('attendances.created_at',$current_year)
            ->orderBy('attendances.created_at','DESC')
            ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number','attendances.attendance','attendances.created_at']);
        return view('parent.attendance-history',compact('page_title','student_data'));
    }

    public function laodHolidayPackageList(){
        $current_year = date('Y');
        $logged_user = Auth::user();
        $parent_data = Parents::where('email',$logged_user->email)->first();
        $page_title = 'Attendance History';
         $student_data = ParentStudent::join('students','students.id','=','parent_students.student_id')
            ->join('parents','parents.id','=','parent_students.parent_id')
            ->join('attendances','attendances.student_id','=','parent_students.student_id')
            ->where('parent_students.parent_id',$parent_data->id)
            ->whereYear('attendances.created_at',$current_year)
            ->orderBy('attendances.created_at','DESC')
            ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number','attendances.attendance','attendances.created_at']);
        return view('parent.holiday-package',compact('page_title','student_data'));
    }
}
