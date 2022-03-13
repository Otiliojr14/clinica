<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\Specialty;
use App\Models\UnvPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_name = 'doctor';
        $medical_records = MedicalHistory::all();
        if (Session::has('nurse')) {
            return redirect('/medical_history/create');
        } elseif (Session::has('doctor')) {
            return view('medical_history.index', compact('session_name', 'medical_records'));
        } else {
            return redirect('/');
        } 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $session_name = 'nurse';
        if (Session::has('nurse')) {
            return view('medical_history.create', compact('session_name'));
        } elseif (Session::has('doctor')) {
            return redirect('/medical_history');
        } else {
            return redirect('/');
        }   
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_ajax = $request->all();

        $matricula = $data_ajax['matricula'];
        $no_beneficiario = $data_ajax['no_beneficiario'];      

        $personal = UnvPersonal::where('matricula', $matricula)->where('no_beneficiario', $no_beneficiario)->first();

        $medical_history = new MedicalHistory;

        $medical_history->cl_personal_id_nurse = 1;
        $medical_history->unv_personal_id = (int) $personal->id;
        $medical_history->sintomas_respiratorios = (int) $data_ajax['sintomas_respiratorios'];
        $medical_history->peso = (float) $data_ajax['peso'];
        $medical_history->talla = (float) $data_ajax['talla'];
        $medical_history->circunferencia = (float) $data_ajax['circunferencia'];
        $medical_history->arterial_diastolica = (int) $data_ajax['arterial_diastolica'];
        $medical_history->arterial_sistolica = (int) $data_ajax['arterial_sistolica'];
        $medical_history->frecuencia_cardiaca = (int) $data_ajax['frecuencia_cardiaca'];
        $medical_history->frecuencia_respiratoria = (int) $data_ajax['frecuencia_respiratoria'];
        $medical_history->temperatura = (float) $data_ajax['temperatura'];
        $medical_history->saturacion_oxigeno = (float) $data_ajax['saturacion_oxigeno'];
        $medical_history->glucosa_ayuno = (int) $data_ajax['glucosa_ayuno'];
        $medical_history->tb_sintomas = (int) $data_ajax['tb_sintomas'];
        $medical_history->imc = (float) $data_ajax['imc'];
        $medical_history->discapacidad = $data_ajax['discapacidad'];

        $medical_history->save();

        if ($medical_history) {
            $data = ['status' => 'correct', 'text' => 'Los datos se ingresaron correctamente en la base de datos'];
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalHistory $medicalHistory)
    {
        $session_name = 'doctor';
        $pacient = $medicalHistory;

        if (Session::has('nurse')) {
            return redirect('/medical_history/create');
        } elseif (Session::has('doctor')) {
            return view('medical_history.show', compact('session_name', 'pacient'));
        } else {
            return redirect('/');
        } 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalHistory $medicalHistory)
    {
        $session_name = 'doctor';
        $pacient = $medicalHistory;
        $specialties = Specialty::all();

        if (Session::has('nurse')) {
            return redirect('/medical_history/create');
        } elseif (Session::has('doctor')) {
            return view('medical_history.edit', compact('session_name', 'pacient', 'specialties'));
        } else {
            return redirect('/');
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        $data_ajax = $request->all();
        $medicalHistory->cl_personal_id_medical = $data_ajax['cl_personal_id_medical'];
        $medicalHistory->diagnostico = nl2br($data_ajax['diagnostico']);
        $medicalHistory->enfermedad_cronica = $data_ajax['enfermedad_cronica'];
        $medicalHistory->consulta_integral = $data_ajax['consulta_integral'];
        $medicalHistory->resistencia_insulina = $data_ajax['resistencia_insulina'];
        $medicalHistory->nutricion = $data_ajax['nutricion'];
        $medicalHistory->act_fisica = $data_ajax['act_fisica'];
        $medicalHistory->psicologia = $data_ajax['psicologia'];
        $medicalHistory->ultimos_lab = $data_ajax['ultimos_lab'];
        $medicalHistory->medicina_interna = $data_ajax['medicina_interna'];
        $medicalHistory->specialty_id = $data_ajax['specialty_id'];
        $medicalHistory->nino_sano = $data_ajax['nino_sano'];
        $medicalHistory->adulto_mayor = $data_ajax['adulto_mayor'];
        $medicalHistory->trimestre = $data_ajax['trimestre'];
        $medicalHistory->consulta_prenatal = $data_ajax['consulta_prenatal'];
        $medicalHistory->riesgo = $data_ajax['riesgo'];
        $medicalHistory->fecha = $data_ajax['fecha'];
        $medicalHistory->labs = $data_ajax['labs'];
        $medicalHistory->estudios = $data_ajax['estudios'];


        print_r($medicalHistory->update());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
