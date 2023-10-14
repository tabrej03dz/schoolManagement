<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StandardBatchSubject;
use App\Models\TeacherAddress;
use Illuminate\Http\Request;
use App\Models\Teacher;
use mysql_xdevapi\ColumnResult;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use App\Http\Requests\TeacherRequest;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    public function index(){
        $teachers = SpladeTable::for(Teacher::class)
            ->column('image')
            ->column('name')
            ->column('phone')
            ->column('email')
            ->column('action');
        return view('dashboard.teacher.index', compact('teachers'));
    }

    public function createForm(){
        $addresses = TeacherAddress::all();
        $teacher = '';
        return view('dashboard.teacher.create', compact('teacher'))->with('addresses',$addresses);
    }

    public function store(TeacherRequest $request){
        $teacher = Teacher::create($request->all());
        $teacherImage = $request->file('image')->store('public/teacher/images');
        //    dd($productImage);
        $teacher->image = str_replace('public/','',$teacherImage);
        $teacher->save();
        Toast::success('teacher created successfully');
        return redirect('dashboard/teacher');

    }

    public function delete(Teacher $teacher){
        $image = $teacher->image;
        if($image){
            unlink('storage/'.$image);
        }
        $teacher->delete();
        Toast::success('deleted successfully');
        return redirect('dashboard/teacher');
    }

    public function edit($id){
        $addresses = TeacherAddress::all();
        $teacher = Teacher::find($id);
        return view('dashboard.teacher.create', compact( 'teacher'))->with('addresses',$addresses);
    }

    public function update(TeacherRequest $request,Teacher $teacher){
        if($request->file('image')){
            $teacher->image ? unlink('storage/'. $teacher->image) : '';
           $teacher->update([
               'image'=>str_replace('public/','', $request->file('image')->store('student/image','public'))
           ]);
        }
        $teacher->update($request->except('image'));
        $teacher->save();
        Toast::success('teacher updated successfully');
        return redirect('dashboard/teacher');
    }

    public function detail($id){
        $details = SpladeTable::for(StandardBatchSubject::where('teacher_id', $id)->get())
            ->column('standard')
            ->column('batch')
            ->column('subject')
            ->Column('teaching_by');
        return view('dashboard.teacher.detail',compact('details'));
    }

    public function searchTeacher(Request $request){
        $search = $request->input('search');
        $teachers = SpladeTable::for(Teacher::where('name', 'like', "%$search%")->orWhere('phone', 'like', "%$search%"))
            ->column('image')
            ->column('name')
            ->column('phone')
            ->column('email')
            ->column('action');
        return view('dashboard.teacher.index', compact('teachers'));
    }

}
