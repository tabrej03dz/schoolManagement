<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardBatchSubjectRequest;
use App\Models\StandardBatchSubject;
use App\Models\Subject;
use App\Models\Batch;
use App\Models\Standard;
use App\Models\Teacher;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class StandardBatchSubjectController extends Controller
{
    public function index(){
        $standardBatchSubjects = SpladeTable::for(StandardBatchSubject::class)
            ->column('standard')
            ->column('batch')
            ->column('subject')
            ->column('teacher')
            ->column('action');
        return view('dashboard.standardBatchSubject.index', compact('standardBatchSubjects'));
    }

    public function create(){
        $standards = Standard::all();
        $batches = Batch::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $standardBatchSubject = '';
        return view('dashboard.standardBatchSubject.create',compact('batches', 'teachers'))->with('standards',$standards)->with('subjects',$subjects)->with('standardBatchSubject',$standardBatchSubject);
    }
    public function store(StandardBatchSubjectRequest $request){
        StandardBatchSubject::create($request->all());

        Toast::success('standard Batch subject added successfully');
        return redirect('dashboard/standardBatchSubject');
    }

    public function delete(StandardBatchSubject $id){
        $id->delete();
        Toast::success('standard batch deleted successfully');
        return redirect('dashboard/standardBatchSubject');
    }

    public function edit($id){
        $standards = Standard::all();
        $batches = Batch::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $standardBatchSubject = StandardBatchSubject::find($id);
        return view('dashboard.standardBatchSubject.create',compact('batches', 'teachers'))->with('standards',$standards)->with('subjects',$subjects)->with('standardBatchSubject',$standardBatchSubject);
    }

    public function update(StandardBatchSubjectRequest $request, StandardBatchSubject $standardBatchSubject){
        $standardBatchSubject->update($request->all());
        Toast::success('standard batch Subject updated successfully');
        return redirect('dashboard/standardBatchSubject');
    }
}
