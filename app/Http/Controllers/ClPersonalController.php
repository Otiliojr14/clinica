<?php

namespace App\Http\Controllers;

use App\Models\ClPersonal;
use App\Models\MedicalHistory;
use App\Models\UnvPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClPersonal  $clPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(ClPersonal $clPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClPersonal  $clPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(ClPersonal $clPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClPersonal  $clPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClPersonal $clPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClPersonal  $clPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClPersonal $clPersonal)
    {
        //
    }

    public function login()
    {
        if (Session::has('nurse')) {
            return redirect('/medical_history/create');
        } elseif (Session::has('doctor')) {
            return redirect('/medical_history');
        } else {
            return view('cl_personal.login');
        }       
        
    }

    public function close_section()
    {
        Session::flush();
        return redirect('/');
    }

    public function showUser(Request $request)
    {
        $cl_personal = $request->all();

        $matricula = $cl_personal['matricula'];

        $personal = UnvPersonal::where('matricula', $matricula)->get();

        if ($personal) {
            $data = ['status' => 'correct', 'nombre' => $personal->nombre, 'apellido' => $personal->nombre, 'telefono' => $personal->telefono, 'categoria' => $personal->category->nombre];
        } else {
            $data = ['status' => 'wrong', 'text' => 'Personal no encontrado'];
        }

        // return response()->json($data);
    }

    public function ajax(Request $request)
    {
        $data_ajax = $request->all();

        $type_query = $data_ajax['type'];

        if ($type_query === 'login') {
            $matricula = $data_ajax['matricula'];
            $password = $data_ajax['password'];
            $tipo_usuario = (int) $data_ajax['tipoUsuario'];

            $personal = UnvPersonal::where('matricula', $matricula)->first();

            // Existe el usuario        
            if ($personal) {
                // Matricula igual a password
                if ($personal->matricula === $password) {
                    // Verificar si existe en la tabla de personal de clinica
                    if ($personal->cl_personal) {

                        $cat_per_clinica = $personal->cl_personal->categoria;

                        // Verificando si el usuario coincide con el rol del personal de clinica
                        if ($cat_per_clinica === $tipo_usuario) {
                            $data = ['status' => 'correct', 'title' => 'Login correcto', 'text' => 'Usuario autenticado, Pulse Ok para ingresar'];

                            if ($tipo_usuario === 1) {
                                Session::put('doctor', $personal);
                            } elseif ($tipo_usuario === 2) {
                                Session::put('nurse', $personal);
                            }                        
   
                        } else {
                            $data = ['status' => 'wrong', 'title' => 'Error!', 'text' => 'El tipo de usuario para este personal es inválido'];
                        }
                        
                    } else {
                        $data = ['status' => 'wrong', 'title' => 'Error!', 'text' => 'El usuario no es personal de la clínica'];
                    }               
                } else {
                    $data = ['status' => 'wrong', 'title' => 'Error!', 'text' => 'El password que ingresó es incorrecto'];
                }
                
            } else {
                $data = ['status' => 'wrong', 'title' => 'Error!', 'text' => 'La matrícula que ingresó no existe.'];
            }  
        } elseif ($type_query === 'obtenerBeneficiarios') {
            $matricula = $data_ajax['matricula'];

            $people = UnvPersonal::where('matricula', $matricula)->get();

            if (sizeof($people) > 0) {
                $data = ['status' => 'correct', 'no_beneficiarios' => sizeof($people)];
            } else {
                $data = ['status' => 'wrong', 'text' => 'La matricula no existe.'];
            }            
        } elseif ($type_query === 'datosPersona') {
            $matricula = $data_ajax['matricula'];
            $no_beneficiario = $data_ajax['no_beneficiario'];

            $personal = UnvPersonal::where('matricula', $matricula)->where('no_beneficiario', $no_beneficiario)->first();
            $nombre_completo = "$personal->nombre $personal->apellido";
            // $people = UnvPersonal::where('matricula', $matricula)->get();
            $data = ['status' => 'correct', 'nombre' => $nombre_completo, 'telefono' => $personal->telefono, 'parentesco' => $personal->parentesco];
        } 
        return response()->json($data);
    }
}
