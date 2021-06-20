<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class ConsultationsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        //$cons = Consultation::all();

        $cons = DB::table('consultations')
            ->join('patients', 'consultations.patient_id', '=', 'patients.id')
            ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
            ->select('consultations.id AS idcons','consultations.doctor_id','consultations.patient_id','consultations.consultation_date','consultations.consultation_time', 'patients.id', 'patients.name AS pname','doctors.id', 'doctors.name AS dname')
            ->get();
        //dd($cons);
        $patient = Patient::all();
        $doctor = Doctor::all();
        
        return view('admin.consultations.index', ['consultations' => $cons, 'patients' => $patient, 'doctors' => $doctor]);
    }

    public function store(Request $request){

        $v = \Validator::make($request->all(), [
            
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'consultation_date' => 'required',
            'consultation_time' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $newConsultation = new Consultation();

        $newConsultation->doctor_id = $request->doctor_id;
        $newConsultation->patient_id = $request->patient_id;
        $newConsultation->consultation_date = $request->consultation_date;
        $newConsultation->consultation_time = $request->consultation_time;
        $newConsultation->save();
        
        return redirect()->back();
    }


    public function update(Request $request, $id){
        
        $v = \Validator::make($request->all(), [
            
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'consultation_date' => 'required',
            'consultation_time' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $consultation = Consultation::find($id);

        $consultation->doctor_id = $request->doctor_id;
        $consultation->patient_id = $request->patient_id;
        $consultation->consultation_date = $request->consultation_date;
        $consultation->consultation_time = $request->consultation_time;
        $consultation->save();
        
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        

        $consultation = Consultation::find($id);

        $consultation->delete();
        
        return redirect()->back();
    }

}
