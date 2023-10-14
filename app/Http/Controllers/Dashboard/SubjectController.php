<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Standard;
use App\Models\Subject;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class SubjectController extends Controller
{
    public function index(){
        $subjects = SpladeTable::for(Subject::class)
            ->column('name')
            ->column('standard_id')
            ->column('action');
        return view('dashboard.subject.index', compact('subjects'));
    }

    public function create(){
        $subject = '';
        $standards = Standard::all();
        return view('dashboard.subject.create')->with('standards',$standards)->with('subject',$subject);
    }
    public function store(SubjectRequest $request){

        Subject::create($request->all());

        Toast::success('subject added successfully');
        return redirect('dashboard/subject');
    }

    public function delete(Subject $subject){
        $subject->delete();
        Toast::success('subject deleted successfully');
        return redirect('dashboard/subject');
    }

    public function edit($id){
        $subject = Subject::find($id);
        $standards = Standard::all();
        return view('dashboard.subject.create')->with('standards',$standards)->with('subject',$subject);
    }

    public function update(SubjectRequest $request, Subject $subject){
        $subject->update($request->all());
        Toast::success('subject updated successfully');
        return redirect('dashboard/subject');
    }

    public function subjectInStandard($id){
        $subjects = SpladeTable::for(Subject::where('standard_id', $id)->get())
            ->column('name')
            ->column('standard_id')
            ->column('action');
        return view('dashboard.subject.index', compact('subjects'));
    }
}
