<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardRequest;
use App\Models\Student;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\Standard;
use App\Models\Teacher;
use App\Models\Subject;


class StandardController extends Controller
{
    public function index(){
        $standards = SpladeTable::for(Standard::class)
            ->column('class')
            ->column('subject_id')
            ->column('teacher')
            ->column('action');
        return view('dashboard.standard.index', compact('standards'));
    }

    public function create(){
        $subjects = Subject::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $standard = '';
        return view('dashboard.standard.create',compact('teachers'))->with('students',$students)->with('subjects',$subjects)->with('standard',$standard);
    }
    public function store(StandardRequest $request){
        $section = Standard::create($request->all());

        Toast::success('standard added successfully');
        return redirect('dashboard/standard');
    }

    public function delete(Standard $standard){
        $standard->delete();
        Toast::success('standard deleted successfully');
        return redirect('dashboard/standard');
    }

    public function edit($id){
        $teachers = Teacher::all();
        $students = Student::all();
        $subjects = Subject::all();
        $standard = Standard::find($id);
//        dd($section);
        return view('dashboard.standard.create',compact('teachers'))->with('students',$students)->with('subjects',$subjects)->with('standard',$standard);
    }

    public function update(StandardRequest $request, Standard $standard){
        $standard->update($request->all());
        Toast::success('standard updated successfully');
        return redirect('dashboard/standard');
    }
}
