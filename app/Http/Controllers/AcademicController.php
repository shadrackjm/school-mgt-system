<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Annual;
use App\Models\Stream;
use App\Models\Package;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Terminal;
use App\Models\TestTerm1;
use App\Models\TestTerm2;
use App\Models\TimeTable;
use App\Models\ExamCategory;
use App\Models\MidtermTerm1;
use App\Models\MidtermTerm2;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Models\TeacherClasses;
use App\Models\TeacherSubject;
use App\Models\ParentStudent;
use App\Models\TeacherPermission;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AcademicController extends Controller
{
  public function LoadHomePage(){
    $page_title = 'Academic Home';
    return view('academic.home',compact('page_title'));
  }

  public function LoadStudents(){
    $page_title = 'Manage Students';
    $student_data = Student::all();
    return view('academic.manage-students',compact('page_title','student_data'));
  }

  public function LoadStudentForm(){
    $page_title = 'Register Student';
    return view('academic.student-form',compact('page_title'));
  }

  public function RegisterStudent(Request $request){
    // validation
    $request->validate([
      'registration_number' => 'required|unique:students',
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'form' => 'required',
      'stream' => 'required',
    ]);
    // Registration
    try {
      $register = new Student;
      $register->firstname = $request->fname;
      $register->middlename = $request->mname;
      $register->lastname = $request->lname;
      $register->registration_number = $request->registration_number;
      $register->form = $request->form;
      $register->stream = $request->stream;
      $register->save();

      return redirect('/manage/students')->with('success','Student Registered Successfully');
    } catch (\Exception $e) {
      return redirect('/manage/students')->with('fail',$e->getMessage());
    }
  }

  public function loadEditForm($id){
    $page_title = 'Edit Student';
    $student_data = Student::where('id',$id)->first();
    return view('academic.edit-student-form',compact('page_title','student_data'));
  }
  public function EditStudent(Request $request){
    $request->validate([
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'form' => 'required',
    ]);
    try {
      $edit = Student::where('registration_number',$request->registration_number)->update([
        'firstname' => $request->fname,
        'middlename' => $request->mname,
        'lastname' => $request->lname,
        'form' => $request->form,
        'category' => $request->category,
      ]);
      return redirect('/manage/students')->with('success','Student Updated Successfully');
    } catch (\Exception $e) {
      return redirect('/manage/students')->with('fail',$e->getMessage());
    }
  }

  public function loadParents(){
    $page_title = 'Manage Parents';
    $parent_data = ParentStudent::join('students','students.id','=','parent_students.student_id')
    ->join('parents','parents.id','=','parent_students.parent_id')
    ->get(['parents.id','parents.fname','parents.mname','parents.lname','parents.email','parents.phone_number','students.firstname','students.lastname','students.registration_number']);
    return view('academic.manage-parent',compact('page_title','parent_data'));
  }
  public function LoadParentForm(){
    $page_title = 'Register Parent';
    return view('academic.parent-form',compact('page_title'));
  }

  public function RegisterParent(Request $request){
    // validation
    $request->validate([
      'registration_number' => 'required',
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'email' => 'required',
      'phone' => 'required',
    ]);
    // Registration
    try {
      $student_data = Student::where('registration_number',$request->registration_number)->first();
        if ($student_data == null) {
                return redirect('/manage/parent')->with('fail','Registration number Does not Exist!');
        }else{
               // check if 
               if (Parents::where('email',$request->email)->exists()) {
					$parent = Parents::where('email',$request->email)->first();
                  if (ParentStudent::where('student_id',$student_data->id)->exists()) {
                    return redirect('/manage/parent')->with('fail',''.strtoupper($student_data->firstname).' with this '.$student_data->registration_number.' Registration Number Already Exist!! try another registration number');
                  }else{
                      	$user = new ParentStudent;
                        $user->parent_id = $parent->id;
                        $user->student_id = $student_data->id;
                        $user->save();
                        return redirect('/manage/parent')->with('success','Parent Registered Successfully');
                  }
               }else{
                  $register = new Parents;
                  $register->fname = $request->fname;
                  $register->mname = $request->mname;
                  $register->lname = $request->lname;
                  $register->email = $request->email;
                  $register->phone_number = $request->phone;
                  $register->save();
                  // get the id
                  $parent_id = $register->id;

                  try{
                      // register as user role = 0
                      $user = new User;
                      $user->username = $request->email;
                      $user->email = $request->email;
                      $user->role = 4;
                      $user->password = Hash::make('parent@123');
                      $user->save();

                      try{
                        $user = new ParentStudent;
                        $user->parent_id = $parent_id;
                        $user->student_id = $student_data->id;
                        $user->save();
                            return redirect('/manage/parent')->with('success','Parent Registered Successfully');
                      }catch(\Exception $e){
                        return redirect('/manage/parent')->with('fail',$e->getMessage());

                      }
                  }catch(\Exception $e){
                    return redirect('/manage/parent')->with('fail',$e->getMessage());
                  }
               }
          
    }
      
    } catch (\Exception $e) {
      return redirect('/manage/parent')->with('fail',$e->getMessage());
    }
  }

  public function loadParentEditForm($id){
    $page_title = 'Edit Parent';
    $parent_data = Parents::where('id',$id)->first();
    $student_data = Student::where('id',$parent_data->student_id)->first();
    return view('academic.edit-parent-form',compact('page_title','parent_data','student_data'));
  }
  public function EditParent(Request $request){
    $request->validate([
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'email' => 'required',
      'registration_number' => 'required',
      'phone' => 'required',
    ]);
    try {
      $edit = Student::where('registration_number',$request->registration_number)->update([
        'firstname' => $request->fname,
        'middlename' => $request->mname,
        'lastname' => $request->lname,
        'form' => $request->form,
        'category' => $request->category,
      ]);
      return redirect('/manage/students')->with('success','Student Updated Successfully');
    } catch (\Exception $e) {
      return redirect('/manage/students')->with('fail',$e->getMessage());
    }
  }
  // subjects
  public function LoadSubjects(){
    $page_title = "Registered Subjects";
    $subject_data = Subject::all();
    return view('academic.subjects',compact('page_title','subject_data'));
  }

  public function LoadSubjectForm(){
    $page_title = 'Register Subject';
    return view('academic.subject-form',compact('page_title'));
  }

  public function RegisterSubject(Request $request){
    // validation
    $request->validate([
      'subject_name' => 'required|unique:subjects',
    ]);

    // Registration
    try {
      $register = new Subject;
      $register->subject_name = $request->subject_name;
      $register->save();

      return redirect('/subjects')->with('success','Subject Registered Successfully');
    } catch (\Exception $e) {
      return redirect('/subjects')->with('fail',$e->getMessage());
    }
  }
  public function loadTeacherSubject(){
    $page_title = 'Teacher - Subject`s Details';
    $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->join('teachers','teachers.id','=','teacher_subjects.teacher_id')
    ->get(['teachers.firstname','teachers.middlename','teachers.lastname','teacher_subjects.id','teacher_subjects.form','teacher_subjects.stream','subjects.subject_name']);
    // SELECT * FROM teacher_subjects INNER JOIN subjects ON subjects.id = teacher_subjects.subject_id
    return view('academic.teacher-subject',compact('page_title','teacher_subject_data'));
  }

  public function loadAssignSubject(){
    $page_title = 'Assign Teacher Subject';
    $subject_data = Subject::all();
    $teacher_data = Teacher::all();
    return view('academic.assign-subject-form',compact('page_title','subject_data','teacher_data'));
  }

  public function AssignSubject(Request $request){
    $request->validate([
      'subject_name' => 'required',
      'teacher_name' => 'required',
      'form' => 'required',
      'stream' => 'required',
    ]);
    try {

      $check_teacher = TeacherSubject::where([['subject_id',$request->subject_name],['teacher_id',$request->teacher_name],['form',$request->form],['stream',$request->stream]])
      ->first();
      if ($check_teacher == null) {
        $assign = new TeacherSubject;
        $assign->subject_id = $request->subject_name;
        $assign->teacher_id = $request->teacher_name;
        $assign->form = $request->form;
        $assign->stream = $request->stream;
        $assign->save();
        return redirect('/teacher/subject')->with('success','Subject Assigned Successfully');
      }else {
        return redirect('/teacher/subject')->with('fail','Subject Assigned To Another Teacher');

      }

    } catch (\Exception $e) {
      return redirect('/teacher/subject')->with('fail',$e->getMessage());

    }

  }
  public function UnassignSubject($id){
    try {
      $unassign = TeacherSubject::where('id',$id)->delete();
      return redirect('/teacher/subject')->with('success','Subject Unassigned Successfully');
    } catch (\Exception $e) {
      return redirect('/teacher/subject')->with('fail',$e->getMessage());
    }
  }

  public function loadPermission(){
    $page_title = 'Assign Teacher Subject';
    $user_data = Auth::user();
    $teacher_data = Teacher::where('email',$user_data->email)->first();
    $permission_data = TeacherPermission::where('teacher_id',$teacher_data->id)->get();
    return view('academic.permission',compact('page_title','permission_data'));
  }

  public function RequestPermission(Request $request){
    $validator = Validator::make($request->all(),[
      'reason' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        // send request
        $send_request = new TeacherPermission;
        $send_request->reason = $request->reason;
        $send_request->teacher_id = $teacher_data->id;
        $send_request->save();

        return response()->json(['success' => true, 'msg' => 'Request Sent Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadForms(){
    $page_title = 'Manage Forms';
    $form_data = Form::all();
    return view('academic.forms',compact('page_title','form_data'));
  }

  public function RegisterForm(Request $request){
    $validator = Validator::make($request->all(),[
      'form' => 'required|unique:forms',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        // change to uppercase
        $uppercase_form = strtoupper($request->form);
        $registerForm = new Form;
        $registerForm->form = $uppercase_form;
        $registerForm->save();

        return response()->json(['success' => true, 'msg' => 'Form Registered Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadStreams(){
    $page_title = 'Manage Streams';
    $stream_data = Stream::join('forms','forms.id','=','streams.form_id')
    ->get(['forms.form','streams.stream','streams.id']);
    $form_data = Form::all();
    return view('academic.stream',compact('page_title','stream_data','form_data'));
  }

  public function RegisterStream(Request $request){
    $validator = Validator::make($request->all(),[
      'stream' => 'required',
      'form_id' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        // change to uppercase
        $RegisterStream = new Stream;
        $RegisterStream->stream = $request->stream;
        $RegisterStream->form_id = $request->form_id;
        $RegisterStream->save();

        return response()->json(['success' => true, 'msg' => 'Stream Registered Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadTeacherClasses(){
    $page_title = 'Manage Teacher Classes';
    $teacher_class_data = TeacherClasses::join('teachers','teachers.id','=','teacher_classes.teacher_id')
    ->join('streams','streams.id','=','teacher_classes.stream_id')
    ->join('forms','forms.id','=','streams.form_id')
    ->get();
    $form_data = Form::all();
    $teacher_data = Teacher::all();

    return view('academic.teacher-class',compact('page_title','teacher_class_data','form_data','teacher_data'));
  }
  public function getStreamData($form_id){
    try {
      $stream_data = Stream::where('form_id',$form_id)->get();
      return response()->json(['success' => true, 'data' => $stream_data]);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'msg' => $e->getMessage()]);

    }
  }
  public function AssignClass(Request $request){
    $validator = Validator::make($request->all(),[
      'stream_id' => 'required',
      'form_id' => 'required',
      'teacher_id' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $check_data = TeacherClasses::join('streams','streams.id','=','teacher_classes.stream_id')
        ->where([['stream_id',$request->stream_id],['form_id',$request->form_id]])->first();
        if ($check_data != null) {
          return response()->json(['success' => false, 'msg' => 'Form and Stream Choosen Already, Assigned to Another Teacher!']);
        }else {
          $RegisterStream = new TeacherClasses;
          $RegisterStream->stream_id = $request->stream_id;
          $RegisterStream->teacher_id = $request->teacher_id;
          $RegisterStream->save();
        return response()->json(['success' => true, 'msg' => 'Class Assigned Successfully']);
        }

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function GetOption($term){
    try {
      $cat_data = ExamCategory::where([['status',1],['term',$term]])->get();
      return response()->json(['success'=>true,'data' => $cat_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }
  public function loadResultManager(){
    $page_title = 'Upload Page';
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
     $teacher_subject_data = Subject::All();
    return view('academic.manage-result',compact('page_title','teacher_subject_data'));
  }
  // test term 1
  public function displayResults($subject_id){
    $page_title = 'Student Result';
    $user_data = Auth::user();
    $teacher_data = Teacher::where('email',$user_data->email)->first();
    $result_data = TestTerm1::join('students','students.id','=','test_term1s.student_id')
    ->join('subjects','subjects.id','=','test_term1s.subject_id')
    ->where('test_term1s.subject_id',$subject_id)
    ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','test_term1s.test_marks']);
    $passed_subject_id = $subject_id;
    return view('academic.display-result',compact('page_title','result_data','passed_subject_id'));
  }
  public function GetResults(Request $request){
    if($request->option == 'test1'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = TestTerm1::join('students','students.id','=','test_term1s.student_id')
        ->join('subjects','subjects.id','=','test_term1s.subject_id')
        ->where('test_term1s.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','test_term1s.test_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
        } catch (\Exception $e) {
          return response()->json(['success' => false,'msg' => $e->getMessage()]);
        }

    }elseif($request->option == 'test2'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = TestTerm2::join('students','students.id','=','test_term2s.student_id')
        ->join('subjects','subjects.id','=','test_term2s.subject_id')
        ->where('test_term2s.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','test_term2s.test_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);
      }
    }elseif($request->option == 'midterm1'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = MidtermTerm1::join('students','students.id','=','midterm_term1s.student_id')
        ->join('subjects','subjects.id','=','midterm_term1s.subject_id')
        ->where('midterm_term1s.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','midterm_term1s.midterm_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);
      }
    }elseif($request->option == 'midterm2'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = MidtermTerm2::join('students','students.id','=','midterm_term2s.student_id')
        ->join('subjects','subjects.id','=','midterm_term2s.subject_id')
        ->where('midterm_term2s.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','midterm_term2s.midterm_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);
      }
    }elseif($request->option == 'terminal'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = Terminal::join('students','students.id','=','terminals.student_id')
        ->join('subjects','subjects.id','=','terminals.subject_id')
        ->where('terminals.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','terminals.terminal_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);
      }
    }elseif($request->option == 'annual'){
      try {
        $user_data = Auth::user();
        $teacher_data = Teacher::where('email',$user_data->email)->first();
        $result_data = Annual::join('students','students.id','=','annuals.student_id')
        ->join('subjects','subjects.id','=','annuals.subject_id')
        ->where('annuals.subject_id',$request->subject_id)
        ->get(['students.firstname','students.middlename','students.lastname','students.registration_number','students.form','students.stream','students.id','subjects.subject_name','annuals.annual_marks']);
          return response()->json(['success' => true,'data' => $result_data]);
      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);

      }
    }else{

    }

  }
  public function loadPackages() {
      $page_title = 'View Packages';
      $logged_user = Auth::user();
      $package_data = Package::join('subjects','subjects.id','=','packages.subject_id')
      ->get(['packages.id','packages.form','packages.stream','packages.created_at','subjects.subject_name']);
      return view('academic.view-package',compact('page_title','package_data'));
  }

   public function ViewPackages($id){
      $package_data = Package::find($id);
      $pathToFile = public_path('uploads/holiday_package/'.$package_data->package_name.'');
      return response()->file($pathToFile);
  }

  public function loadStudentImportForm(){
		$page_title = 'Import Student Excel File';
		$logged_user = Auth::user();
		return view('academic.import-student',compact('page_title'));
  }

  public function ImportStudent(Request $request){
	$request->validate([
		'excel_file' => 'required|mimes:xlsx',
	]);
	try {
		Excel::import(new StudentImport,request()->file('excel_file'));
		return redirect('/manage/students')->with('success','Excel file Imported Successfully!');
	} catch (\Exception $e) {
		return redirect('/manage/students')->with('fail',$e->getMessage());
	}
  }
  	public function LoadAssignedSubjects(){
		$logged_user = Auth::user();
		$teacher_data = Teacher::where('email',$logged_user->email)->first();
		$page_title = 'Assigned Subjects';
		$teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
		->where('teacher_id',$teacher_data->id)->get();
		return view('academic.assigned-subjects',compact('page_title','teacher_subject_data'));
  }
  public function LoadAssignedClasses(){
	$logged_user = Auth::user();
	$teacher_data = Teacher::where('email',$logged_user->email)->first();
	$page_title = 'Assigned Classes';
	$teacher_subject_data = TeacherClasses::join('streams','streams.id','=','teacher_classes.stream_id')
	->join('forms','forms.id','=','streams.form_id')
	->where('teacher_id',$teacher_data->id)->get();
	return view('academic.assigned-classes',compact('page_title','teacher_subject_data'));
}

public function loadUploadPage(){
  $page_title = 'Upload Page';
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->where('teacher_subjects.teacher_id',$teacher_data->id)
	->get(['teacher_subjects.form','teacher_subjects.stream','teacher_subjects.id','subjects.subject_name']);
  return view('academic.upload-result',compact('page_title','teacher_subject_data'));

}
public function loadUploadForm($id){
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->where('teacher_subjects.id',$id)
    ->first();

  $page_title = 'Result for Form '.$teacher_subject_data->form.' Stream '.$teacher_subject_data->stream.'';
  $student_data = Student::where([['form',$teacher_subject_data->form],['stream',$teacher_subject_data->stream]])
  ->get();
  return view('academic.upload-result-form',compact('page_title','student_data','teacher_subject_data'));

}

public function GetOptions($term){
  try {
    $cat_data = ExamCategory::where([['status',1],['term',$term]])->get();
    return response()->json(['success'=>true,'data' => $cat_data]);
  } catch (\Exception $e) {
    return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
  }
}

public function Test1Upload(Request $request){
  	$validator = Validator::make($request->all(),[
    	'test1' => 'required',
    ]);

    if($validator->fails()){
    return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
    try {
      $user_data = Auth::user();
      $teacher_data = Teacher::where('email',$user_data->email)->first();
      $check_result = TestTerm1::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
      ->first();

      if ($check_result == null) {
        // send request
        $send_request = new TestTerm1;
        $send_request->test_marks = $request->test1;
        $send_request->student_id = $request->student_id;
        $send_request->teacher_id = $teacher_data->id;
        $send_request->form = $request->form;
        $send_request->stream = $request->stream;
        $send_request->subject_id = $request->subject_id;
        $send_request->save();

        return response()->json(['success' => true, 'msg' =>'Test Result Uploaded Successfully']);

      }else{
        return response()->json(['success' => false, 'msg' =>'Term 1 Test Result for Student Already Uploaded!']);

      }


    } catch (\Exception $e) {
      return response()->json(['success' => false, 'msg' => $e->getMessage()]);
    }
    }
}

public function Test2Upload(Request $request){
	$validator = Validator::make($request->all(),[
	  'test2' => 'required',
  ]);

  if($validator->fails()){
  return response()->json(['msg' => $validator->errors()->toArray()]);
  }else{
  try {

	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
  $check_result = TestTerm2::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
      ->first();

      if ($check_result == null) {
        // send request
        $send_request = new TestTerm2;
        $send_request->test_marks = $request->test2;
        $send_request->student_id = $request->student_id;
        $send_request->teacher_id = $teacher_data->id;
        $send_request->form = $request->form;
          $send_request->stream = $request->stream;
          $send_request->subject_id = $request->subject_id;
        $send_request->save();

        return response()->json(['success' => true, 'msg' =>'Test Result Uploaded Successfully']);
      }else{
        return response()->json(['success' => false, 'msg' =>'Term 2 Test Result for Student Already Uploaded!']);

      }
  } catch (\Exception $e) {
	return response()->json(['success' => false, 'msg' => $e->getMessage()]);
  }
  }
}

public function midterm1Upload(Request $request){
	$validator = Validator::make($request->all(),[
	  'midterm1' => 'required',
  ]);

  if($validator->fails()){
  return response()->json(['msg' => $validator->errors()->toArray()]);
  }else{
  try {

	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
  $check_result = MidtermTerm1::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
      ->first();

      if ($check_result == null) {
        // send request
        $send_request = new MidtermTerm1;
        $send_request->midterm_marks = $request->midterm1;
        $send_request->student_id = $request->student_id;
        $send_request->teacher_id = $teacher_data->id;
        $send_request->form = $request->form;
        $send_request->stream = $request->stream;
		$send_request->subject_id = $request->subject_id;
        $send_request->save();

        return response()->json(['success' => true, 'msg' =>'Midterm Result Uploaded Successfully']);
      }else{
        return response()->json(['success' => false, 'msg' =>'Term 1 Midterm Result for Student Already Uploaded!']);

      }
  } catch (\Exception $e) {
	return response()->json(['success' => false, 'msg' => $e->getMessage()]);
  }

  }
}

public function midterm2Upload(Request $request){
	$validator = Validator::make($request->all(),[
	  'midterm2' => 'required',
  ]);

  if($validator->fails()){
  return response()->json(['msg' => $validator->errors()->toArray()]);
  }else{
  try {

	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
  $check_result = MidtermTerm2::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
      ->first();

      if ($check_result == null) {
        // send request
        $send_request = new MidtermTerm2;
        $send_request->midterm_marks = $request->midterm2;
        $send_request->student_id = $request->student_id;
        $send_request->teacher_id = $teacher_data->id;
        $send_request->form = $request->form;
            $send_request->stream = $request->stream;
		$send_request->subject_id = $request->subject_id;

        $send_request->save();

        return response()->json(['success' => true, 'msg' =>'Midterm Result Uploaded Successfully']);
      }else{
        return response()->json(['success' => false, 'msg' =>'Term 2 Midterm Result for Student Already Uploaded!']);

      }
  } catch (\Exception $e) {
	return response()->json(['success' => false, 'msg' => $e->getMessage()]);
  }
  }
}

public function terminalUpload(Request $request){
	$validator = Validator::make($request->all(),[
	  'terminal' => 'required',
  ]);

  if($validator->fails()){
  return response()->json(['msg' => $validator->errors()->toArray()]);
  }else{
  try {

		$user_data = Auth::user();
		$teacher_data = Teacher::where('email',$user_data->email)->first();
		$check_result = Terminal::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
		->first();

		if ($check_result == null) {
		// send request
			$send_request = new Terminal;
			$send_request->terminal_marks = $request->terminal;
			$send_request->student_id = $request->student_id;
			$send_request->teacher_id = $teacher_data->id;
			$send_request->form = $request->form;
			$send_request->stream = $request->stream;
		$send_request->subject_id = $request->subject_id;

			$send_request->save();

			return response()->json(['success' => true, 'msg' =>'Terminal Result Uploaded Successfully']);
		}else{
			return response()->json(['success' => false, 'msg' =>'Terminal Result for Student Already Uploaded!']);
		}
	} catch (\Exception $e) {
	  return response()->json(['success' => false, 'msg' => $e->getMessage()]);
  	}
  }
}

public function annualUpload(Request $request){
	$validator = Validator::make($request->all(),[
	  'annual' => 'required',
  ]);

  if($validator->fails()){
  return response()->json(['msg' => $validator->errors()->toArray()]);
  }else{
  try {

	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
		$check_result = Annual::where([['student_id',$request->student_id],['teacher_id',$teacher_data->id],['form',$request->form],['stream',$request->stream],['subject_id',$request->subject_id]])
		->first();

		if ($check_result == null) {
			// send request
			$send_request = new Annual;
			$send_request->annual_marks = $request->annual;
			$send_request->student_id = $request->student_id;
			$send_request->teacher_id = $teacher_data->id;
			$send_request->form = $request->form;
			$send_request->stream = $request->stream;
			$send_request->subject_id = $request->subject_id;

			$send_request->save();

			return response()->json(['success' => true, 'msg' =>'Annaul Result Uploaded Successfully']);
		}else{
			return response()->json(['success' => false, 'msg' =>'Annaul Result for Student Already Uploaded!']);

		}
  } catch (\Exception $e) {
	return response()->json(['success' => false, 'msg' => $e->getMessage()]);
  }
  }
}

public function loadResultManage(){
	$page_title = 'Upload Page';
	$logged_user = Auth::user();
	$teacher_data = Teacher::where('email',$logged_user->email)->first();
	 $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->where('teacher_id',$teacher_data->id)
	->get(['teacher_subjects.form','teacher_subjects.stream','teacher_subjects.id','teacher_subjects.subject_id','subjects.subject_name']);
	return view('academic.academic-manage-result',compact('page_title','teacher_subject_data'));
}
// test term 1
public function displayMyResult($subject_id){
	$page_title = ' Student Result';
	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
	 $result_data = TestTerm1::join('students','students.id','=','test_term1s.student_id')
	->join('subjects','subjects.id','=','test_term1s.subject_id')
	->where([['test_term1s.teacher_id',$teacher_data->id],['test_term1s.subject_id',$subject_id]])
	->get();
	$passed_subject_id = $subject_id;
	return view('academic.academic-display-result',compact('page_title','result_data','passed_subject_id'));
}
public function GetMyresult(Request $request){
	if($request->option == 'test2'){
		try {
			$user_data = Auth::user();
		$teacher_data = Teacher::where('email',$user_data->email)->first();
		 $result_data = TestTerm2::join('students','students.id','=','test_term2s.student_id')
		->join('subjects','subjects.id','=','test_term2s.subject_id')
		->where([['test_term2s.teacher_id',$teacher_data->id],['test_term2s.subject_id',$request->subject_id]])
		->get();
			return response()->json(['success' => true,'data' => $result_data]);
		} catch (\Exception $e) {
			return response()->json(['success' => false,'msg' => $e->getMessage()]);

		}

	}elseif($request->option == 'midterm1'){
		try {
			$user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
			$result_data = MidtermTerm1::join('students','students.id','=','midterm_term1s.student_id')
			->join('subjects','subjects.id','=','midterm_term1s.subject_id')
			->where([['midterm_term1s.teacher_id',$teacher_data->id],['midterm_term1s.subject_id',$request->subject_id]])
			->get();
				return response()->json(['success' => true,'data' => $result_data]);
		} catch (\Exception $e) {
			return response()->json(['success' => false,'msg' => $e->getMessage()]);

		}
	}elseif($request->option == 'midterm2'){
		try {
			$user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
			$result_data = MidtermTerm2::join('students','students.id','=','midterm_term2s.student_id')
			->join('subjects','subjects.id','=','midterm_term2s.subject_id')
			->where([['midterm_term2s.teacher_id',$teacher_data->id],['midterm_term2s.subject_id',$request->subject_id]])
			->get();
				return response()->json(['success' => true,'data' => $result_data]);
		} catch (\Exception $e) {
			return response()->json(['success' => false,'msg' => $e->getMessage()]);

		}
	}elseif($request->option == 'terminal'){
		try {
			$user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
			$result_data = Terminal::join('students','students.id','=','terminals.student_id')
			->join('subjects','subjects.id','=','terminals.subject_id')
			->where([['terminals.teacher_id',$teacher_data->id],['terminals.subject_id',$request->subject_id]])
			->get();
				return response()->json(['success' => true,'data' => $result_data]);
		} catch (\Exception $e) {
			return response()->json(['success' => false,'msg' => $e->getMessage()]);

		}
	}elseif($request->option == 'annual'){
		try {
			$user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
			$result_data = Annual::join('students','students.id','=','annuals.student_id')
			->join('subjects','subjects.id','=','annuals.subject_id')
			->where([['annuals.teacher_id',$teacher_data->id],['annuals.subject_id',$request->subject_id]])
			->get();
				return response()->json(['success' => true,'data' => $result_data]);
		} catch (\Exception $e) {
			return response()->json(['success' => false,'msg' => $e->getMessage()]);

		}
	}else{

	}

}

public function loadTimetableManager(){
      $user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
      $page_title = "Manage Timetable";
      $timetable_data = TimeTable::join('subjects','subjects.id','=','time_tables.subject_id')
      ->join('teachers','teachers.id','=','time_tables.teacher_id')
      ->get();

      $form_data = Form::all();
      $stream = Stream::all();
       $stream1_data = Stream::where('form_id',1)->orderBy('stream','ASC')->get();
      $stream2_data = Stream::where('form_id',2)->orderBy('stream','ASC')->get();
      $stream3_data = Stream::where('form_id',3)->orderBy('stream','ASC')->get();
      $stream4_data = Stream::where('form_id',4)->orderBy('stream','ASC')->get();
      $stream5_data = Stream::where('form_id',5)->orderBy('stream','ASC')->get();
      $stream6_data = Stream::where('form_id',6)->orderBy('stream','ASC')->get();
      $subject_data = Subject::all();
      return view('academic.manage-timetable',compact('page_title','stream','stream1_data','stream2_data','stream3_data','stream4_data','stream5_data','stream6_data','subject_data','form_data','timetable_data'));
}

  public function CreateTimetable(Request $request){
    $validator = Validator::make($request->all(),[
      'subject_id' => 'required',
      'form_id' => 'required',
      'stream' => 'required',
      'time' => 'required',
      'day' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        $form_data = Form::where('id',$request->form_id)->first();
        $subject_data = Subject::where('id',$request->subject_id)->first();

        $teacher_subject_data = TeacherSubject::where([['subject_id',$request->subject_id],['form',$form_data->form],['stream',$request->stream]])->first();
		if ($teacher_subject_data == null) {
				return response()->json(['success' => false,'msg' => ''.$subject_data->subject_name.' is not assigned to any teacher in '.$form_data->form.' - '.$request->stream.'']);
		}else {
			$timetable_data = TimeTable::where([['time',$request->time],['teacher_id',$teacher_subject_data->teacher_id],['subject_id',$request->subject_id],['form',$form_data->form],['stream',$request->stream],['day',$request->day]])->first();
			if ($timetable_data == null) {
				$insert = new TimeTable;
				$insert->form = $form_data->form;
				$insert->subject_id = $request->subject_id;
				$insert->teacher_id = $teacher_subject_data->teacher_id;
				$insert->stream = $request->stream;
				$insert->day = $request->day;
				$insert->time = $request->time;
				$insert->save();

				return response()->json(['success' => true,'msg' => 'Time Table Added Successfully']);
			}else {
				return response()->json(['success' => false,'msg' => 'Time Table Created Already Exist! Try to Cross Check Again!']);
			}
		}

      } catch (\Exception $e) {
        return response()->json(['success' => false,'msg' => $e->getMessage()]);
      }

    }
  }

  public function loadExamCat(){
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
    $page_title = 'Exams Categories';
    $exam_cat = ExamCategory::all();
    return view('academic.exam-cat',compact('page_title','exam_cat'));
  }

  public function RegisterExamCat(Request $request){
    $validator = Validator::make($request->all(),[
      'term' => 'required',
      'cat' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        // change to uppercase
        $registerForm = new ExamCategory;
        $registerForm->term = $request->term;
        $registerForm->exam_category = $request->cat;
        $registerForm->save();

        return response()->json(['success' => true, 'msg' => 'Exam Category Registered Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function enableCat($id){
      try {
        $update = ExamCategory::where('id',$id)->update([
            'status' => 1,
        ]);
        return redirect('/exam/cat')->with('success', 'Exam Category Updated Successfully');
      } catch (\Exception $e) {
        return redirect('/exam/cat')->with('fail', $getMessage());
      }
  }

  public function disableCat($id){
    try {
      $update = ExamCategory::where('id',$id)->update([
          'status' => 0,
      ]);
      return redirect('/exam/cat')->with('success', 'Exam Category Updated Successfully');
    } catch (\Exception $e) {
      return redirect('/exam/cat')->with('fail', $getMessage());
    }
  }

  public function loadResultReport(){
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
    $page_title = 'Exams Categories';
    return view('academic.result-report',compact('page_title','exam_cat'));
  }
}
