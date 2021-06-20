<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $doctors = Doctor::all();
        
        return view('admin.doctors.index', ['doctors' => $doctors]);
    }

    public function store(Request $request){

        $v = \Validator::make($request->all(), [
            
            'name' => 'required',
            'specialty' => 'required',
            'description' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $newDoctor = new Doctor();

        $newDoctor->name = $request->name;
        $newDoctor->specialty = $request->specialty;
        $newDoctor->description = $request->description;
        $newDoctor->save();
        
        return redirect()->back();
    }


    public function update(Request $request, $id){
        
        $v = \Validator::make($request->all(), [
            
            'name' => 'required',
            'specialty' => 'required',
            'description' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->specialty = $request->specialty;
        $doctor->description = $request->description;
        $doctor->save();
        
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        

        $doctor = Doctor::find($id);

        $doctor->delete();
        
        return redirect()->back();
    }
}
