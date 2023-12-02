<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FinanceStaff;
use App\Models\TeacherPermission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HeadMasterController extends Controller
{
  public function LoadHomePage(){
    $page_title = 'Head Master Home';
    return view('head_master.home',compact('page_title'));
  }
  public function LoadTeacherRecords(){
    $page_title = 'Teachers Records';
    $teacher_data = Teacher::all();
    return view('head_master.teacher-record',compact('page_title','teacher_data'));
  }
  public function RegisterTeacher(Request $request){
    try {
      $validator = Validator::make($request->all(),[
        'fname' => 'required',
        'mname' => 'required',
        'lname' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'education_level' => 'required',
      ]);

      if($validator->fails()){
        return response()->json(['msg' => $validator->errors()->toArray()]);
      }else{
        try {
          $register = new Teacher;
          $register->firstname = $request->fname;
          $register->middlename = $request->mname;
          $register->lastname = $request->lname;
          $register->email = $request->email;
          $register->gender = $request->gender;
          $register->phone_number = $request->phone_number;
          $register->education_level = $request->education_level;
          $register->save();

          // register as user role = 0
          $user = new User;
          $user->username = $request->email;
          $user->email = $request->email;
          $user->role = 0;
          $user->password = Hash::make('school@123');
          $user->save();

          return response()->json(['success' => true, 'msg' => 'Teacher registered successfully']);
        } catch (\Exception $e) {
          return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
      }
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'msg' => $e->getMessage()]);

    }
  }
  public function GetTeacherDetails($teacher_id){
    try {
      $teacher_data = Teacher::where('id',$teacher_id)->get();
      return response()->json(['success'=>true,'data' => $teacher_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }

 
  public function EditTeacher(Request $request){

    $validator = Validator::make($request->all(),[
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'gender' => 'required',
      'email' => 'required',
      'phone_number' => 'required',
      'education_level' => 'required',
      'status' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        $update_teacher = Teacher::where('id',$request->teacher_id)->update([
          'firstname' => $request->fname,
          'middlename' => $request->mname,
          'lastname' => $request->lname,
          'email' => $request->email,
          'gender' => $request->gender,
          'phone_number' => $request->phone_number,
          'education_level' => $request->education_level,
          'role' => $request->status,
        ]);

        $update_user = User::where('email',$request->old_email)->update([
          'username' => $request->email,
          'email' => $request->email,
          'role' => $request->status,
        ]);
        return response()->json(['success' => true, 'msg' => 'Teacher Updated Successfully']);

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadPermissionRecord(){
    $page_title = 'Permission Records';
    $permission_data = TeacherPermission::join('teachers','teachers.id','=','teacher_permissions.teacher_id') //select teacher_permissions.id,teacher_permissions.status,teachers.firstname INNER JOIN teachers ON teachers.id = teacher_permissions.teacher_id;
    ->get(['teacher_permissions.id','teacher_permissions.created_at','teacher_permissions.reason','teacher_permissions.duration','teacher_permissions.status','teachers.firstname','teachers.middlename','teachers.lastname']);
    return view('head_master.permission',compact('page_title','permission_data'));
  }

  public function GetRequestDetails($request_id){
    try {
      $request_data = TeacherPermission::where('id',$request_id)->get();
      return response()->json(['success'=>true,'data' => $request_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }

  public function AcceptPermission(Request $request){
    $validator = Validator::make($request->all(),[
      'duration' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
          $update_request = TeacherPermission::where('id',$request->request_id)->update([
            'duration' => $request->duration,
            'status' => 1,
          ]);
      return response()->json(['success'=>true,'msg' => 'Request Accepted Successfully']);

      } catch (\Exception $e) {
      return response()->json(['success'=>true,'msg' => $e->getMessage()]);

      }

    }
  }

  public function RejectPermission(Request $request){
    $validator = Validator::make($request->all(),[
      'remark' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
          $update_request = TeacherPermission::where('id',$request->request_id)->update([
            // 'remark' => $request->remark,
            'status' => 2,
          ]);
      return response()->json(['success'=>true,'msg' => 'Request Rejected Successfully']);

      } catch (\Exception $e) {
      return response()->json(['success'=>true,'msg' => $e->getMessage()]);

      }

    }
  }

  public function loadFinancials(){
    $page_title = 'Financial Staffs';
    $finance_staff_data = FinanceStaff::all();
    return view('head_master.fianance-staff',compact('page_title','finance_staff_data'));
  }

   public function RegisterFinanceStaff(Request $request){
    try {
      $validator = Validator::make($request->all(),[
        'fname' => 'required',
        'mname' => 'required',
        'lname' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
      ]);

      if($validator->fails()){
        return response()->json(['msg' => $validator->errors()->toArray()]);
      }else{
        try {
          $register = new FinanceStaff;
          $register->firstname = $request->fname;
          $register->middlename = $request->mname;
          $register->lastname = $request->lname;
          $register->email = $request->email;
          $register->gender = $request->gender;
          $register->phone_number = $request->phone_number;
          $register->save();

          // register as user role = 0
          $user = new User;
          $user->username = $request->email;
          $user->email = $request->email;
          $user->role = 3;
          $user->password = Hash::make('school@123');
          $user->save();

          return response()->json(['success' => true, 'msg' => 'Finance Staff registered successfully']);
        } catch (\Exception $e) {
          return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
      }
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'msg' => $e->getMessage()]);

    }
  }
 public function GetFinanceStaffDetails($staff_id){
    try {
      $teacher_data = FinanceStaff::where('id',$staff_id)->get();
      return response()->json(['success'=>true,'data' => $teacher_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }

public function EditFinanceStaff(Request $request){

    $validator = Validator::make($request->all(),[
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'gender' => 'required',
      'email' => 'required',
      'phone_number' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        $update_teacher = FinanceStaff::where('id',$request->teacher_id)->update([
          'firstname' => $request->fname,
          'middlename' => $request->mname,
          'lastname' => $request->lname,
          'email' => $request->email,
          'gender' => $request->gender,
          'phone_number' => $request->phone_number,
        ]);

        $update_user = User::where('email',$request->old_email)->update([
          'username' => $request->email,
          'email' => $request->email,
        ]);
        return response()->json(['success' => true, 'msg' => 'Finance Staff Updated Successfully']);

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
}
