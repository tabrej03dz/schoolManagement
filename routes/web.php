<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PluginController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\TrafficsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\StandardController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\StudentAddressController;
use App\Http\Controllers\Dashboard\TeacherAddressController;
use App\Http\Controllers\Dashboard\StandardBatchSubjectController;
use App\Http\Controllers\Dashboard\AssignmentController;
use App\Http\Controllers\Dashboard\ExamController;
use App\Http\Controllers\Dashboard\ScoreController;
use App\Models\Language;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/language/{code}', function ($code) {
        $language = Language::where('code', $code)->first();
        if ($language) {
            Session::put('locale', $code);
        }
        return redirect()->back();
    })->name('switch-language');

    Route::middleware(['guest', 'checkUserRegistration'])->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });

    Route::get('/', function () {
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('user', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('languages', LanguageController::class);
        Route::get('traffics', [TrafficsController::class, 'index'])->name('traffics.index');
        Route::get('traffics/logs', [TrafficsController::class, 'logs'])->name('traffics.logs');
        Route::get('error-reports', [TrafficsController::class, 'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}', [TrafficsController::class, 'error_report'])->name('traffics.error-report');


//        teacher route


        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });

        Route::prefix('plugins')->name('plugins.')->group(function(){
            Route::get('/',[PluginController::class,'index'])->name('index');
            Route::get('/install',[PluginController::class,'create'])->name('create');
            Route::post('/install',[PluginController::class,'store'])->name('store');
            Route::post('/{plugin}/activate',[PluginController::class,'activate'])->name('activate');
            Route::post('/{plugin}/deactivate',[PluginController::class,'deactivate'])->name('deactivate');
            Route::post('/{plugin}/delete',[PluginController::class,'delete'])->name('delete');
        });


        Route::prefix('teacher')->name('teacher.')->group(function(){
            Route::get('/',[TeacherController::class,'index'])->name('index');
            Route::get('/create',[TeacherController::class,'createForm'])->name('create');
            Route::post('/store',[TeacherController::class,'store'])->name('store');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
            Route::post('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
            Route::get('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
            Route::get('/detail/{id}', [TeacherController::class, 'detail'])->name('detail');
            Route::post('search', [TeacherController::class, 'searchTeacher'])->name('search');
        });

        Route::prefix('student')->name('student.')->group(function(){
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/delete/{student}', [StudentController::class, 'delete'])->name('delete');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
            Route::post('/update/{student}', [StudentController::class, 'update'])->name('update');
            Route::get('/student_in_standard/{id}', [StudentController::class, 'studentInStandard'])->name('standard');
            Route::post('search', [StudentController::class, 'searchStudent'])->name('search');
        });

        Route::prefix('section')->name('section.')->group(function(){
            Route::get('/', [SectionController::class, 'index'])->name('index');
            Route::get('/delete/{section}', [SectionController::class, 'delete'])->name('delete');
            Route::get('/create', [SectionController::class, 'create'])->name('create');
            Route::post('/store', [SectionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('edit');
            Route::post('/update/{section}', [SectionController::class, 'update'])->name('update');
        });

//        standards route

        Route::prefix('standard')->name('standard.')->group(function(){
            Route::get('/', [StandardController::class, 'index'])->name('index');
            Route::get('/delete/{standard}', [StandardController::class, 'delete'])->name('delete');
            Route::get('/create', [StandardController::class, 'create'])->name('create');
            Route::post('/store', [StandardController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StandardController::class, 'edit'])->name('edit');
            Route::post('/update/{standard}', [StandardController::class, 'update'])->name('update');
        });

//        Subjects Route
        Route::prefix('subject')->name('subject.')->group(function(){
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::get('/delete/{subject}', [SubjectController::class, 'delete'])->name('delete');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::post('/store', [SubjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
            Route::post('/update/{subject}', [SubjectController::class, 'update'])->name('update');
            Route::get('/subject_in_standard/{id}', [SubjectController::class, 'subjectInStandard'])->name('standard');

        });

//        Student address route
        Route::prefix('sAddress')->name('sAddress.')->group(function(){
            Route::get('/', [StudentAddressController::class, 'index'])->name('index');
            Route::get('/delete/{address}', [StudentAddressController::class, 'delete'])->name('delete');
            Route::get('/create', [StudentAddressController::class, 'create'])->name('create');
            Route::post('/store', [StudentAddressController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentAddressController::class, 'edit'])->name('edit');
            Route::post('/update/{address}', [StudentAddressController::class, 'update'])->name('update');
        });

//        teacher address route
        Route::prefix('tAddress')->name('tAddress.')->group(function(){
            Route::get('/', [TeacherAddressController::class, 'index'])->name('index');
            Route::get('/delete/{address}', [TeacherAddressController::class, 'delete'])->name('delete');
            Route::get('/create', [TeacherAddressController::class, 'create'])->name('create');
            Route::post('/store', [TeacherAddressController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TeacherAddressController::class, 'edit'])->name('edit');
            Route::post('/update/{address}', [TeacherAddressController::class, 'update'])->name('update');
            Route::get('/trash', [TeacherAddressController::class, 'deletedRecord'])->name('trash');
            Route::get('/delete_permanent/{id}', [TeacherAddressController::class, 'deletePermanent'])->name('delete_permanent');
            Route::get('/restore/{id}', [TeacherAddressController::class, 'restore'])->name('restore');
        });

//        standard batch subject route
        Route::prefix('standardBatchSubject')->name('standardBatchSubject.')->group(function(){
            Route::get('/', [StandardBatchSubjectController::class, 'index'])->name('index');
            Route::get('/delete/{id}', [StandardBatchSubjectController::class, 'delete'])->name('delete');
            Route::get('/create', [StandardBatchSubjectController::class, 'create'])->name('create');
            Route::post('/store', [StandardBatchSubjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StandardBatchSubjectController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StandardBatchSubjectController::class, 'update'])->name('update');
        });

//        assignment route
        Route::prefix('assignment')->name('assignment.')->group(function(){
            Route::get('assignment_of_student/{id}', [AssignmentController::class, 'studentAssignment'])->name('student');
        });

//      exams route
        Route::prefix('exam')->name('exam.')->group(function(){
            Route::get('/', [ExamController::class, 'index'])->name('index');
            Route::get('/delete/{exam}', [ExamController::class, 'delete'])->name('delete');
            Route::get('/create/{id}', [ExamController::class, 'create'])->name('create');
            Route::post('/store/{standard_id}', [ExamController::class, 'store'])->name('store');
        });

//        scores routes
        Route::prefix('score')->name('score.')->group(function(){
            Route::get('/', [ScoreController::class, 'index'])->name('index');
            Route::get('/delete/{score}', [ScoreController::class, 'delete'])->name('delete');
            Route::get('/create/{student_id}', [ScoreController::class, 'create'])->name('create');
            Route::post('/store/{student_id}', [ScoreController::class, 'store'])->name('store');
            Route::get('student_score/{id}', [ScoreController::class, 'studentScore'])->name('student');
        });

    });
});
