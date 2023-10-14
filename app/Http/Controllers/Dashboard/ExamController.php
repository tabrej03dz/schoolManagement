<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\Exams;

class ExamController extends Controller
{
    public function index(){
        $exams = SpladeTable::for(Exams::class)
            ->column('name')
            ->column('type')
            ->column('subject')
            ->column('standard')
            ->column('action');

        return view('dashboard.exam.index', compact('exams'));
    }


    public function create($id){
        $subjects = Subject::where('standard_id', $id)->get();
        return view('dashboard.exam.create',compact('subjects'));
    }
    public function store(Request $request, $standardId){
        $exam = Exams::create($request->all());
        $exam->standard_id = $standardId;
        $exam->save();
        Toast::autoDismiss('7')->message('Exam Added Successfully');
        return redirect('dashboard/exam');
    }

    public function delete(Exams $exam){
        $exam->delete();
        Toast::autoDismiss('8')->message('Exam Deleted Successfully');
        return redirect('dashboard/exam');
    }
}
