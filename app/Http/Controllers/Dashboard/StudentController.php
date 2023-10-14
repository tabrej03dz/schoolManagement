<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Standard;
use App\Models\Student;
use App\Models\StudentAddress;
use App\Models\StudentSection;
use App\Tables\Traffics;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Str;
use App\Models\Section;


class StudentController extends Controller
{

    public static function generateUniqueRollNumber()
    {
        $rollNumber = 'R' . Str::random(6); // You can adjust the length as needed

        // Check if the generated roll number already exists in the database
        while (Student::where('roll_number', $rollNumber)->exists()) {
            $rollNumber = 'R' . Str::random(6); // Regenerate if it already exists
        }

        return $rollNumber;
    }
    public function index(){
        $students = SpladeTable::for(Student::class)
            ->column('image')
            ->column('name')
            ->column('roll_number')
            ->column('gender')
        ->column('action');

        return view('dashboard.student.index', compact('students'));
    }


    public function create(){
        $addresses = StudentAddress::all();
        $student = '';
        $sections = Section::all();
        $standards = Standard::all();
        return view('dashboard.student.create',compact( 'standards'))->with('addresses', $addresses)->with('student', $student);
    }
    public function store(StudentRequest $request){
        $student = Student::create($request->all());
        $studentImage = $request->file('image')->store('public/student/image');
        $student->image = str_replace('public/','', $studentImage);
//        $student->roll_number = StudentController::generateUniqueRollNumber();
        $student->save();
        StudentSection::create([
            'section_id' => $student->section_id,
            'student_id' => $student->id,
        ]);
        Toast::success('student added successfully');
        return redirect('dashboard/student');
    }

    public function delete(Student $student){
        $image = $student->image;
        unlink('storage/'. $image);
        $student->delete();
        Toast::success('student deleted successfully');
        return redirect('dashboard/student');
    }

    public function edit(Student $student){
        $addresses = StudentAddress::all();
        $sections = Section::all();
        $standards = Standard::all();
        return view('dashboard.student.create',compact('standards'))->with('student', $student)->with('addresses', $addresses);
    }

    public function update(StudentRequest $request, Student $student){

        if($request->file('image')){
            $student->image ? unlink('storage/'. $student->image) : '';
           $student->update([
               'image'=>str_replace('public/','', $request->file('image')->store('student/image','public'))
           ]);
        }
        $student->update($request->except('image'));
        Toast::success('student updated successfully');
        return redirect('dashboard/student');
    }
    public function studentInStandard($id){

        $students = SpladeTable::for(Student::where('standard_id', $id)->get())
            ->column('image')
            ->column('name')
            ->column('roll_number')
            ->column('gender')
            ->column('action');

        return view('dashboard.student.index', compact('students'));
    }

    public function searchStudent(Request $request){
        $search = $request->input('search');
        $students = SpladeTable::for(Student::where('name','like', "%$search%")->orwhere('parents', 'like', "%$search%"))
            ->column('image')
            ->column('name')
            ->column('roll_number')
            ->column('gender')
            ->column('action');

        return view('dashboard.student.index', compact('students'));
    }

}
