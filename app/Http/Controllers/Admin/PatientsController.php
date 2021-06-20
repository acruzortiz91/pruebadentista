<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $patients = Patient::all();
        
        return view('admin.patients.index', ['patients' => $patients]);
    }

    public function store(Request $request){

        $v = \Validator::make($request->all(), [
            
            'name' => 'required',
            'gender' => 'required',
            'weight' => 'required|numeric|between:0,299.99',
            'height' => 'required|numeric|between:0,299.99',
            'date_of_birth' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $newPatient = new Patient();

        $newPatient->name = $request->name;
        $newPatient->gender = $request->gender;
        $newPatient->weight = $request->weight;
        $newPatient->height = $request->height;
        $newPatient->date_of_birth = $request->date_of_birth;
        $newPatient->save();
        
        return redirect()->back();
    }


    public function update(Request $request, $id){
        
        $v = \Validator::make($request->all(), [
            
            'name' => 'required',
            'gender' => 'required',
            'weight' => 'required|numeric|between:0,299.99',
            'height' => 'required|numeric|between:0,299.99',
            'date_of_birth' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $patient = Patient::find($id);

        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->save();
        
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        

        $patient = Patient::find($id);

        $patient->delete();
        
        return redirect()->back();
    }
}
