<?php

namespace App\Http\Controllers;

use App\Models\ClPersonal;
use App\Models\UnvPersonal;
use Illuminate\Http\Request;

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
        return view('cl_personal.login');
    }

    public function check_user(Request $request)
    {   
        $cl_personal = $request->all();
        
        $matricula = $cl_personal['matricula'];
        $password = $cl_personal['password'];
        $tipo_usuario = (int) $cl_personal['tipoUsuario'];

        $personal = UnvPersonal::where('matricula', $matricula)->first();

        // Existe el usuario        
        if ($personal) {
            // Matricula igual a password
            if ($personal->matricula === $password) {
                // Verificar si existe en la tabla de personal de clinica
                if ($personal->cl_personal) {

                    $cat_per_clinica = $personal->cl_personal->categoria;

                    if ($cat_per_clinica === $tipo_usuario) {
                        $data = ['status' => 'correct', 'title' => 'Login correcto', 'text' => 'Usuario autenticado, Pulse Ok para ingresar'];
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
        
        return response()->json($data);
        
    }
}
