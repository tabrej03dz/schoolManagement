<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Student;
use ProtoneMedia\Splade\SpladeTable;

class AssignmentController extends Controller
{
    public function studentAssignment($id){
        $assignments = SpladeTable::for(Assignment::where('student_id', $id))
            ->column('name')
            ->column('action');
        return view('dashboard.student.assignment',compact('assignments'));
    }
}
