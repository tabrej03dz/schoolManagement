<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exams;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ScoreController extends Controller
{
    public function index(){
        $scores = SpladeTable::for(Score::class)
            ->column('marks')
            ->column('student')
            ->column('exam')
            ->column('type')
            ->column('action');

        return view('dashboard.score.index', compact('scores'));
    }


    public function create($id){

        $student = Student::find($id);
        $exams = Exams::where('standard_id', $student->standard_id)->get();
        return view('dashboard.score.create', compact( 'exams', 'id'));
    }
    public function store(Request $request, $id){
        $score = Score::create($request->all());
        $score->student_id = $id;
        $score->save();
        Toast::autoDismiss('7')->message('Exam Added Successfully');
        return redirect()->back();
    }

    public function delete(Score $score){
        $score->delete();
        Toast::autoDismiss('8')->message('Exam Deleted Successfully');
        return redirect('dashboard/score');
    }

    public function studentScore($id){
        $scores = SpladeTable::for(Score::where('student_id', $id)->get())
            ->column('marks')
            ->column('student')
            ->column('exam')
            ->column('type')
            ->column('action');

        return view('dashboard.score.index', compact('scores','id'));
    }
}
