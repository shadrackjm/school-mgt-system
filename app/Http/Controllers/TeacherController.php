<?php

namespace App\Http\Controllers;
use App\Models\Form;

use App\Models\Annual;
use App\Models\Stream;
use App\Models\Package;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Terminal;
use App\Models\TestTerm1;
use App\Models\TestTerm2;
use App\Models\TimeTable;
use App\Models\Attendance;
use App\Models\ExamCategory;
use App\Models\MidtermTerm1;
use App\Models\MidtermTerm2;
use Illuminate\Http\Request;
use App\Models\TeacherClasses;
use App\Models\TeacherSubject;
use App\Models\StudentPermission;
use App\Models\TeacherPermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{
  public function LoadHomePage(){
      $page_title = 'Teacher Home';
      return view('teacher.home',compact('page_title'));
  }
  public function LoadAssignedSubjects(){
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
    $page_title = 'Assigned Subjects';
    $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->where('teacher_id',$teacher_data->id)->get();
    return view('teacher.assigned-subjects',compact('page_title','teacher_subject_data'));
  }

  public function loadPermission(){
    $page_title = 'Assign Teacher Subject';
    $user_data = Auth::user();
    $teacher_data = Teacher::where('email',$user_data->email)->first();
    $permission_data = TeacherPermission::where('teacher_id',$teacher_data->id)->get();
    return view('teacher.permission',compact('page_title','permission_data'));
  }

public function TeacherRequestPermission(Request $request){
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

public function LoadAssignedClasses(){
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $page_title = 'Assigned Classes';
  $teacher_subject_data = TeacherClasses::join('streams','streams.id','=','teacher_classes.stream_id')
  ->join('forms','forms.id','=','streams.form_id')
  ->where('teacher_id',$teacher_data->id)->get();
  return view('teacher.assigned-classes',compact('page_title','teacher_subject_data'));
}

public function loadUploadPage(){
  $page_title = 'Upload Page';
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $teacher_subject_data = TeacherSubject::join('subjects','subjects.id','=','teacher_subjects.subject_id')
    ->where('teacher_subjects.teacher_id',$teacher_data->id)
	->get(['teacher_subjects.form','teacher_subjects.stream','teacher_subjects.id','subjects.subject_name']);
  return view('teacher.upload-result',compact('page_title','teacher_subject_data'));

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
  return view('teacher.upload-result-form',compact('page_title','student_data','teacher_subject_data'));

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
    ->where('teacher_id',$teacher_data->id)->get(['teacher_subjects.form','teacher_subjects.stream','teacher_subjects.id','teacher_subjects.subject_id','subjects.subject_name']);
	return view('teacher.manage-result',compact('page_title','teacher_subject_data'));
}
// test term 1
public function displayResult($subject_id){
	$page_title = ' Student Result';
	$user_data = Auth::user();
	$teacher_data = Teacher::where('email',$user_data->email)->first();
	 $result_data = TestTerm1::join('students','students.id','=','test_term1s.student_id')
	->join('subjects','subjects.id','=','test_term1s.subject_id')
	->where([['test_term1s.teacher_id',$teacher_data->id],['test_term1s.subject_id',$subject_id]])
	->get();
	$passed_subject_id = $subject_id;
	return view('teacher.display-result',compact('page_title','result_data','passed_subject_id'));
}
public function Getresults(Request $request){
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

public function loadPackages(){
  $current_year = date('Y');
  $page_title = 'Upload Page';
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $package_data = Package::join('subjects','subjects.id','=','packages.subject_id')
  ->where('packages.teacher_id',$teacher_data->id)
	->get(['packages.form','packages.stream','packages.id','packages.created_at','subjects.subject_name']);
  return view('teacher.manage-packages',compact('page_title','package_data'));
}

public function loadPackagesForm(){
  $current_year = date('Y');
  $page_title = 'Upload Form';
  $logged_user = Auth::user();
  $teacher_data = Teacher::where('email',$logged_user->email)->first();
  $subject_data = TeacherSubject::join('subjects','subjects.id','teacher_subjects.subject_id')
  ->where('teacher_subjects.teacher_id',$teacher_data->id)
  ->get(['subjects.subject_name','teacher_subjects.id','teacher_subjects.form','teacher_subjects.stream']);
  
  return view('teacher.upload-package-form',compact('page_title','subject_data'));
}

public function UploadHoliday(Request $request){
  
    $request->validate([
      'package' => 'required|mimes:pdf',
        'subject_id' => 'required',
    ]);

    try {
      $logged_user = Auth::user();
      $teacher_data = Teacher::where('email',$logged_user->email)->first();

      // fetch taarifa subject
      $teacher_subject_data = TeacherSubject::where('id',$request->subject_id)
      ->first();
      $package_data = Package::where([['form',$teacher_subject_data->form],['stream',$teacher_subject_data->stream],['subject_id',$teacher_subject_data->subject_id],['teacher_id',$teacher_data->id]])->first();

      if ($package_data == null) {
      
      // insert
      $file = date('mdYHis').uniqid().'.'.$request->package->extension();
      $request->package->move(public_path('uploads/holiday_package'),$file);
      
      $upload = new Package;
      $upload->teacher_id = $teacher_data->id;
      $upload->subject_id = $teacher_subject_data->subject_id;
      $upload->form = $teacher_subject_data->form;
      $upload->stream = $teacher_subject_data->stream;
      $upload->package_name = $file;
      $upload->save();

      return redirect('/manage/package')->with('success','package uploaded successfully');
      }else {
      return redirect('/form/package')->with('fail','package for Form '.$teacher_subject_data->form.' '.$teacher_subject_data->stream.' Has Already Uploaded!');
        
      }
    } catch (\Exception $e) {
      return redirect('/form/package')->with('fail','package uploaded successfully');
    }
      
}

public function DeletePackage($id){
  try{
   $package_data =  Package::where('id',$id)->first();
   unlink(public_path('uploads/holiday_package/').$package_data->package_name);
   $package_data =  Package::where('id',$id)->delete();
   return redirect('/manage/package')->with('success','package deleted successfully');
  }catch(\Exception $e){
    return redirect('/manage/package')->with('fail',$e->getMessage());

  }
}
  public function timeTable(){
    $user_data = Auth::user();
			$teacher_data = Teacher::where('email',$user_data->email)->first();
      $page_title = "Manage Timetable";
      $timetable_data = TimeTable::join('subjects','subjects.id','=','time_tables.subject_id')
      ->where('time_tables.teacher_id',$teacher_data->id)
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
      return view('teacher.timetable',compact('page_title','stream','stream1_data','stream2_data','stream3_data','stream4_data','stream5_data','stream6_data','subject_data','form_data','timetable_data'));
  }


// attendances
  public function loadClassAttendance(){
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
    $page_title = 'Classes Attendance';
    $teacher_subject_data = TeacherClasses::join('streams','streams.id','=','teacher_classes.stream_id')
    ->join('forms','forms.id','=','streams.form_id')
    ->where('teacher_id',$teacher_data->id)
    ->get(['forms.form','streams.stream','teacher_classes.id']);
    return view('teacher.attendance-classes',compact('page_title','teacher_subject_data'));
  }

  public function loadStudentAttendance($form,$stream){
      $logged_user = Auth::user();
      $teacher_data = Teacher::where('email',$logged_user->email)->first();
      $page_title = 'Student Attendance';
      $student_data = Student::where([['form',$form],['stream',$stream],['attendance_status',0]])->get();
      $form_l = $form;
      $stream_l = $stream;
      return view('teacher.student-attendance2',compact('page_title','student_data','form_l','stream_l'));
  }

  public function createAttendance(Request $request){
     $today = date('Y-m-d');
         $check_date  =  Attendance::where('student_id',$request->student_id)
            ->whereDate('created_at',$today)
            ->first();
                if ($check_date == null) {
         try {
           foreach ($request->student_id as $key => $student_id) {
			
                    $attendance = new Attendance;
                    $attendance->student_id = $request->student_id[$key];
                    $attendance->attendance = $request->attendance[$key] ?? null;
                    $attendance->save();
            }
            return response()->json(['success' => true,'msg' => ''.$today.'`s Attendance Created Successfully!']);

        } catch (\Exception $e) {
			    return response()->json(['success' => false,'msg' => $e->getMessage()]);
        }
        }else {
                    return response()->json(['success' => false,'msg' => ''.$today.'`s Attendance Aleady Created']);
                }
  }

  public function loadAttendanceReview($form,$stream){
     $today = date('Y-m-d');
        $logged_user = Auth::user();
      $teacher_data = Teacher::where('email',$logged_user->email)->first();
      $page_title = 'Attendance Review';
      $student_data = Student::join('attendances','attendances.student_id','=','students.id')
      ->where([['students.form',$form],['students.stream',$stream]])
      ->whereDate('attendances.created_at',$today)
      ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number','attendances.attendance']);
      return view('teacher.attendance-review',compact('page_title','student_data'));
  }

  public function UpdateAttendance(Request $request){
     $today = date('Y-m-d');
         try {
            if ($request->attendance_status == 3) {
                    try {
                        $update_status = StudentPermission::where('student_id',$request->student_id)->delete();
                        try {
                        	$delete_atte = Attendance::where('student_id',$request->student_id)->delete();
                            try {
								$update = Student::where('id',$request->student_id)->update([
									'attendance_status' =>  0,
								]);
								return response()->json(['success' => true,'msg' => ''.$today.'`s Attendance Updated Successfully!']);

                            }catch (\Exception $e) {
			                    return response()->json(['success' => false,'msg' => $e->getMessage()]);
                        }
                        }catch (\Exception $e) {
			                    return response()->json(['success' => false,'msg' => $e->getMessage()]);
                        }
                    } catch (\Exception $e) {
			                return response()->json(['success' => false,'msg' => $e->getMessage()]);
                    }
            }else {
                $update = Attendance::where('student_id',$request->student_id)->update([
                    'attendance' =>  $request->attendance,
                ]);
			    return response()->json(['success' => true,'msg' => ''.$today.'`s Attendance Updated Successfully!']);

            }

        } catch (\Exception $e) {
			    return response()->json(['success' => false,'msg' => $e->getMessage()]);
        }
  }
 public function loadAttendanceHistory($form,$stream){
        $current_year = date('Y');
        $logged_user = Auth::user();
      $teacher_data = Teacher::where('email',$logged_user->email)->first();
      $page_title = 'Attendance History';
      $student_data = Student::join('attendances','attendances.student_id','=','students.id')
      ->where([['students.form',$form],['students.stream',$stream]])
      ->whereYear('attendances.created_at',$current_year)
      ->orderBy('attendances.created_at','DESC')
      ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number','attendances.attendance','attendances.created_at']);
      return view('teacher.attendance-history',compact('page_title','student_data'));
  }

public function loadClassPermission(){
    $logged_user = Auth::user();
    $teacher_data = Teacher::where('email',$logged_user->email)->first();
    $page_title = 'Classes Permission';
    $teacher_subject_data = TeacherClasses::join('streams','streams.id','=','teacher_classes.stream_id')
    ->join('forms','forms.id','=','streams.form_id')
    ->where('teacher_id',$teacher_data->id)
    ->get(['forms.form','streams.stream','teacher_classes.id']);
    return view('teacher.class-permission',compact('page_title','teacher_subject_data'));
  }

  public function loadStudentPermission($form,$stream){
     $today = date('Y-m-d');
        $logged_user = Auth::user();
      $teacher_data = Teacher::where('email',$logged_user->email)->first();
      $page_title = 'Student List - Permission';
      $student_data = Student::where([['students.form',$form],['students.stream',$stream]])
      ->get(['students.id','students.firstname','students.middlename','students.lastname','students.registration_number']);
      return view('teacher.permission-review',compact('page_title','student_data'));
  }

   public function createPermission(Request $request){
    	$validator = Validator::make($request->all(),[
	        'student_id' => 'required',
	        'duration' => 'required',
	        'reason' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['msg' => $validator->errors()->toArray()]);
        }else{
                $today = date('Y-m-d');
                $check_date  =  StudentPermission::where('student_id',$request->student_id)
                ->whereDate('created_at',$today)
                ->first();

                $logged_user = Auth::user();
                $teacher_data = Teacher::where('email',$logged_user->email)->first();
            if ($check_date == null) {
                try {
                        $permission = new StudentPermission;
                        $permission->student_id = $request->student_id;
                        $permission->teacher_id = $teacher_data->id;
                        $permission->reason = $request->reason;
                        $permission->duration = $request->duration;
                        $permission->save();

                        try {
                            $check_attend = Attendance::where('student_id',$request->student_id)
                            ->whereDate('created_at',$today)
                            ->first();
                            if ($check_attend == null) {
                                $attendance = new Attendance;
                                $attendance->student_id = $request->student_id;
                                $attendance->attendance = 3;
                                $attendance->save();
                            }else {
                                $update_attend = Attendance::where('student_id',$request->student_id)->update([
                                    'attendance' => 3,
                                ]);
                            }
                            

                            try {
                                $update_status = Student::where('id',$request->student_id)->update([
                                    'attendance_status' => 3,
                                ]);
                                return response()->json(['success' => true,'msg' => 'Permission Created Successfully!']);
                            } catch (\Exception $e) {
                                return response()->json(['success' => false,'msg' => $e->getMessage()]);
                            }
                        } catch (\Exception $e) {
                            return response()->json(['success' => false,'msg' => $e->getMessage()]);
                        }
                } catch (\Exception $e) {
                        return response()->json(['success' => false,'msg' => $e->getMessage()]);
                }
        }else {
            return response()->json(['success' => false,'msg' => ''.$today.'`s Permission Already Created']);
        }
     }
  }
}
