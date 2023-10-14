<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StudentAddress;
use App\Http\Requests\StudentAddressRequest;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class StudentAddressController extends Controller
{
    public function index(){
        $addresses = SpladeTable::for(StudentAddress::class)
            ->column('city')
            ->column('action');
        return view('dashboard.studentAddress.index', compact('addresses'));
    }

    public function create(){
        $address = '';
        return view('dashboard.studentAddress.create')->with('address',$address);
    }
    public function store(StudentAddressRequest $request){

        StudentAddress::create($request->all());

        Toast::success('address added successfully');
        return redirect('dashboard/sAddress');
    }

    public function delete(StudentAddress $address){
        $address->delete();
        Toast::success('address deleted successfully');
        return redirect('dashboard/sAddress');
    }

    public function edit($id){
        $address = StudentAddress::find($id);
        return view('dashboard.studentAddress.create')->with('address',$address);
    }

    public function update(StudentAddressRequest $request, StudentAddress $address){
        $address->update($request->all());
        Toast::success('address updated successfully');
        return redirect('dashboard/sAddress');
    }
}
