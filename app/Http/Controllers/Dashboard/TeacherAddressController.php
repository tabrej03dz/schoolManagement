<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherAddressRequest;
use App\Models\TeacherAddress;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;


class TeacherAddressController extends Controller
{
    public function index(){
        $addresses = SpladeTable::for(TeacherAddress::class)
            ->column('city')
            ->column('action');
        return view('dashboard.teacherAddress.index', compact('addresses'));
    }

    public function create(){
        $address = '';
        return view('dashboard.teacherAddress.create')->with('address',$address);
    }
    public function store(TeacherAddressRequest $request){

        TeacherAddress::create($request->all());

        Toast::success('address added successfully');
        return redirect('dashboard/tAddress');
    }

    public function delete(TeacherAddress $address){
        $address->delete();
        Toast::success('address deleted successfully');
        return redirect('dashboard/tAddress');
    }

    public function edit($id){
        $address = TeacherAddress::find($id);
        return view('dashboard.teacherAddress.create')->with('address',$address);
    }

    public function update(TeacherAddressRequest $request, TeacherAddress $address){
        $address->update($request->all());
        Toast::success('address updated successfully');
        return redirect('dashboard/tAddress');
    }

    public function deletedRecord(){
        $addresses = SpladeTable::for(TeacherAddress::onlyTrashed())
            ->column('city')
            ->column('action');
        return view('dashboard.teacherAddress.trashed', compact('addresses'));
    }

    public function restore($id){
        $address = TeacherAddress::withTrashed()->find($id);
        $address->restore();
        return redirect('dashboard/tAddress');
    }

    public function deletePermanent(TeacherAddress $address){
        $address->forceDelete();
        return redirect('dashboard/tAddress/trash');
    }
}
