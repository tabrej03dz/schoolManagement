<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Section;
use App\Models\Standard;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    public function index(){
        $sections = SpladeTable::for(Section::class)
            ->column('name')
            ->column('action');
        return view('dashboard.section.index', compact('sections'));
    }

    public function create(){
        $standards = Standard::all();
        $batches = Batch::all();
        $section = '';
        return view('dashboard.section.create')->with('section',$section)->with('standards',$standards)->with('batches', $batches);
    }
    public function store(SectionRequest $request){

        $section = Section::create($request->all());

        Toast::success('section added successfully');
        return redirect('dashboard/section');
    }

    public function delete(Section $section){
        $section->delete();
        Toast::success('section deleted successfully');
        return redirect('dashboard/section');
    }

    public function edit($id){
        $standards = Standard::all();
        $batches = Batch::all();
        $section = Section::find($id);
//        dd($section);
        return view('dashboard.section.create',compact('batches','standards'))->with('section',$section);
    }

    public function update(SectionRequest $request, Section $section){
        $section->update($request->all());
        Toast::success('section updated successfully');
        return redirect('dashboard/section');
    }
}
