<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\HeadMasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Login');
});

Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login-user',[AuthController::class,'LoginUser'])->name('LoginUser');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/forgot-password',[AuthController::class,'loadforgot']);
Route::post('/forgot-password',[AuthController::class,'forgot'])->name('forgot-password');
//password Reset
Route::get('/reset-password',[AuthController::class,'resetpasswordLoad']);
Route::post('/resetting',[AuthController::class,'ResetPassword'])->name('ResetPassword');

//academic Routes
Route::group(['middleware' => ['web','checkAcademic']],function(){
Route::get('academic/home',[AcademicController::class,'LoadHomePage']);
Route::get('/manage/students',[AcademicController::class,'LoadStudents']);
Route::get('/register/student',[AcademicController::class,'LoadStudentForm']);
Route::post('/register/students',[AcademicController::class,'RegisterStudent'])->name('RegisterStudent');
Route::get('/edit/student/{id}',[AcademicController::class,'loadEditForm']);
Route::post('/edit/student',[AcademicController::class,'EditStudent'])->name('EditStudent');

Route::get('/subjects',[AcademicController::class,'LoadSubjects']);
Route::get('/register/subject',[AcademicController::class,'LoadSubjectForm']);
Route::post('/register/student',[AcademicController::class,'RegisterSubject'])->name('RegisterSubject');
Route::get('/teacher/subject',[AcademicController::class,'loadTeacherSubject']);
Route::get('/assign/subject',[AcademicController::class,'loadAssignSubject']);
Route::post('/assign/subject',[AcademicController::class,'AssignSubject'])->name('AssignSubject');
Route::get('/unassign/subject/{id}',[AcademicController::class,'UnassignSubject']);

Route::get('/permission',[AcademicController::class,'loadPermission']);
Route::get('request/permission/re',[AcademicController::class,'RequestPermission'])->name('RequestPermission');

Route::get('/forms',[AcademicController::class,'loadForms']);
Route::get('/streams',[AcademicController::class,'loadStreams']);
Route::get('/register/form',[AcademicController::class,'RegisterForm'])->name('RegisterForm');
Route::get('/register/stream',[AcademicController::class,'RegisterStream'])->name('RegisterStream');
Route::get('/teacher/class',[AcademicController::class,'loadTeacherClasses']);
Route::get('/get/stream/data/{form_id}',[AcademicController::class,'getStreamData'])->name('getStreamData');
Route::get('/assign/classes',[AcademicController::class,'AssignClass'])->name('AssignClass');
Route::get('/academic/manage/result',[AcademicController::class,'loadResultManager']);
Route::get('/academic/get/option/{term}',[AcademicController::class,'GetOption'])->name('GetOption');

Route::get('/academic/view/result/{subject_id}',[AcademicController::class,'displayResults']);
  Route::get('/academic/get/result',[AcademicController::class,'GetResults'])->name('GetResults');
Route::get('/view/packages',[AcademicController::class,'loadPackages']);
Route::get('/view/packages/{id}',[AcademicController::class,'ViewPackages']);
Route::get('/import/students/form',[AcademicController::class,'loadStudentImportForm']);
Route::post('/import/student',[AcademicController::class,'ImportStudent'])->name('ImportStudent');

// 
  Route::get('/academic/assigned/subjects',[AcademicController::class,'LoadAssignedSubjects']);
  Route::get('/academic/assigned/classes',[AcademicController::class,'LoadAssignedClasses']);
  Route::get('/academic/upload/result',[AcademicController::class,'loadUploadPage']);
  Route::get('/academic/upload/result/{id}',[AcademicController::class,'loadUploadForm'])->name('AcademicloadUploadForm');
  Route::get('/academic/get/options/{term}',[AcademicController::class,'GetOptions'])->name('AcademicGetOptions');
  Route::get('/academic/test1/upload/',[AcademicController::class,'Test1Upload'])->name('AcademicTest1Upload');
  Route::get('/academic/test2/upload/',[AcademicController::class,'Test2Upload'])->name('AcademicTest2Upload');
  Route::get('/academic/mideterm1/upload/',[AcademicController::class,'midterm1Upload'])->name('Academicmidterm1Upload');
  Route::get('/academic/mideterm2/upload/',[AcademicController::class,'midterm2Upload'])->name('Academicmidterm2Upload');
  Route::get('/academic/terminal/upload/',[AcademicController::class,'terminalUpload'])->name('AcademicterminalUpload');
  Route::get('/academic/annual/upload/',[AcademicController::class,'annualUpload'])->name('AcademicannualUpload');
  Route::get('/my/manage/result',[AcademicController::class,'loadResultManage']);
  Route::get('/academic/result/{subject_id}',[AcademicController::class,'displayMyResult']);
  Route::get('/manage/timetable',[AcademicController::class,'loadTimetableManager']);
  Route::get('/create/timetable',[AcademicController::class,'CreateTimetable'])->name('CreateTimetable');

  Route::get('/exam/cat',[AcademicController::class,'loadExamCat']);
  Route::get('/register/exam/cat',[AcademicController::class,'RegisterExamCat'])->name('RegisterExamCat');
  Route::get('/enable/cat/{id}',[AcademicController::class,'enableCat']);
  Route::get('/disable/cat/{id}',[AcademicController::class,'disableCat']);

  Route::get('/result/report/',[AcademicController::class,'loadResultReport']);

  Route::get('/manage/parent/',[AcademicController::class,'loadParents']);
  Route::get('/register/parent',[AcademicController::class,'LoadParentForm']);
  Route::post('/register/parents',[AcademicController::class,'RegisterParent'])->name('RegisterParent');
  Route::get('/edit/parent/{id}',[AcademicController::class,'loadParentEditForm']);
  Route::post('/edit/parent',[AcademicController::class,'EditParent'])->name('EditParent');



  
});
// headmaster Routes
Route::group(['middleware' => ['web','checkHeadmaster']],function(){
Route::get('headmaster/home',[HeadMasterController::class,'LoadHomePage']);
Route::get('/teachers',[HeadMasterController::class,'LoadTeacherRecords']);
Route::get('/register/teacher',[HeadMasterController::class,'RegisterTeacher'])->name('RegisterTeacher');
Route::get('/teacher/details/{teacher_id}',[HeadMasterController::class,'GetTeacherDetails'])->name('GetTeacherDetails');
Route::get('/edit/teacher',[HeadMasterController::class,'EditTeacher'])->name('EditTeacher');
Route::get('/teacher/permission',[HeadMasterController::class,'loadPermissionRecord'])->name('loadPermissionRecord');
Route::get('/request/details/{request_id}',[HeadMasterController::class,'GetRequestDetails'])->name('GetRequestDetails');
Route::get('/accept/request',[HeadMasterController::class,'AcceptPermission'])->name('AcceptPermission');
Route::get('/reject/request',[HeadMasterController::class,'RejectPermission'])->name('RejectPermission');

Route::get('/financials',[HeadMasterController::class,'loadFinancials']);
Route::get('/register/finance/staff',[HeadMasterController::class,'RegisterFinanceStaff'])->name('RegisterFinanceStaff');
Route::get('/staff/details/{staff_id}',[HeadMasterController::class,'GetFinanceStaffDetails'])->name('GetFinanceStaffDetails');
Route::get('/edit/finance/staff',[HeadMasterController::class,'EditFinanceStaff'])->name('EditFinanceStaff');

});


// finance staff middleware & routes
Route::group(['middleware' => ['web','checkFinance']],function(){
    Route::get('/finance/home',[FinanceController::class,'loadHome']);
    Route::get('/financial/records',[FinanceController::class,'loadFinancialInfo']);
    Route::get('/register/records',[FinanceController::class,'RegisterFinanceInfo'])->name('RegisterFinanceInfo');
    Route::get('/edit/records',[FinanceController::class,'EditInfo'])->name('EditInfo');
    Route::get('/all/students',[FinanceController::class,'loadAllStudents']);
    Route::get('/student/financial/details/{id}',[FinanceController::class,'loadStudentsFinancialDetails']);
    Route::post('/payment/one',[FinanceController::class,'InstallmentOne'])->name('InstallmentOne');
    Route::post('/payment/two',[FinanceController::class,'InstallmentTwo'])->name('InstallmentTwo');
    Route::post('/payment/three',[FinanceController::class,'InstallmentThree'])->name('InstallmentThree');
    Route::post('/payment/four',[FinanceController::class,'InstallmentFour'])->name('InstallmentFour');
 
  });

  // Parent middleware & routes
Route::group(['middleware' => ['web','checkParent']],function(){
  Route::get('/parent/home',[ParentController::class,'loadHomePage']);
  Route::get('/student/finance/records',[ParentController::class,'loadPaymentDetails']);
  Route::get('/students/financial/detail/{id}',[ParentController::class,'loadStudentPaymentDetails']);
  Route::get('/parent/attendance/records',[ParentController::class,'loadAttendanceRecords']);
  Route::get('/holiday/package/list',[ParentController::class,'laodHolidayPackageList']);
});
//teacher Routes
Route::group(['middleware' => ['web','checkTeacher']],function(){
  Route::get('teacher/home',[TeacherController::class,'LoadHomePage']);
  Route::get('/assigned/subjects',[TeacherController::class,'LoadAssignedSubjects']);
  Route::get('/teacher/permissions',[TeacherController::class,'loadPermission']);
  Route::get('request/permissions/',[TeacherController::class,'TeacherRequestPermission'])->name('TeacherRequestPermission');
  Route::get('/assigned/classes',[TeacherController::class,'LoadAssignedClasses']);
  Route::get('/upload/result',[TeacherController::class,'loadUploadPage']);
  Route::get('/upload/result/{id}',[TeacherController::class,'loadUploadForm'])->name('loadUploadForm');
  Route::get('/get/options/{term}',[TeacherController::class,'GetOptions'])->name('GetOptions');
  Route::get('/test1/upload/',[TeacherController::class,'Test1Upload'])->name('Test1Upload');
  Route::get('/test2/upload/',[TeacherController::class,'Test2Upload'])->name('Test2Upload');
  Route::get('/mideterm1/upload/',[TeacherController::class,'midterm1Upload'])->name('midterm1Upload');
  Route::get('/mideterm2/upload/',[TeacherController::class,'midterm2Upload'])->name('midterm2Upload');
  Route::get('/terminal/upload/',[TeacherController::class,'terminalUpload'])->name('terminalUpload');
  Route::get('/annual/upload/',[TeacherController::class,'annualUpload'])->name('annualUpload');
  Route::get('/manage/result',[TeacherController::class,'loadResultManage']);
  Route::get('/view/result/{subject_id}',[TeacherController::class,'displayResult']);
  Route::get('/get/result',[TeacherController::class,'Getresults'])->name('Getresults');
  Route::get('/manage/package',[TeacherController::class,'loadPackages']);
  Route::get('/form/package',[TeacherController::class,'loadPackagesForm']);
  Route::post('/upload/package',[TeacherController::class,'UploadHoliday'])->name('UploadHoliday');
  Route::get('/delete/package/{id}',[TeacherController::class,'DeletePackage'])->name('DeletePackage');
  Route::get('/session/timetable',[TeacherController::class,'timeTable']);

  Route::get('/class/attendance',[TeacherController::class,'loadClassAttendance']);
  Route::get('/student/attendance/{form}/{stream}',[TeacherController::class,'loadStudentAttendance']);
  Route::get('/students/attendance/',[TeacherController::class,'createAttendance'])->name('createAttendance');

  Route::get('/attendance/review/{form}/{stream}',[TeacherController::class,'loadAttendanceReview']);
  Route::get('/update/attendance/',[TeacherController::class,'UpdateAttendance'])->name('UpdateAttendance');
  Route::get('/attendance/history/{form}/{stream}',[TeacherController::class,'loadAttendanceHistory']);

  Route::get('/student/permission',[TeacherController::class,'loadClassPermission']);
  Route::get('/student/permission/{form}/{stream}',[TeacherController::class,'loadStudentPermission']);
  Route::get('/create/permission/',[TeacherController::class,'createPermission'])->name('createPermission');

});
