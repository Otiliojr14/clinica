@extends('layout.admin')

@section('title')
    Información del paciente
@endsection

@section('content')
<main class="show-pacient">
    <section class="identification">
        <div class="information box-info">
            <h5 class="box-info__title">{{$pacient->unv_personal->nombre}} {{$pacient->unv_personal->apellido}}</h5>
            <p class="box-info__label">Matrícula</p>
            <p class="box-info__data">{{$pacient->unv_personal->matricula}}</p>
            <p class="box-info__label">Telefono</p>
            <p class="box-info__data">{{$pacient->unv_personal->telefono}}</p> 
            <p class="box-info__label">Relacion familiar</p>
            <p class="box-info__data">{{$pacient->unv_personal->parentesco}}</p>
            <p class="box-info__label">Enfermero que lo registró</p>
            <p class="box-info__data">{{$pacient->cl_personal_nurse->unv_personal->nombre}} {{$pacient->cl_personal_nurse->unv_personal->apellido}}</p>
        </div>
    </section>
    <section class="pacient-data">
        <div class="physic box-info">
            <h5 class="box-info__title">Físico</h5>
            <div class="box-info__section">
                <div class="box-info__data-content">
                    <p class="box-info__label">Sintomas respiratorios</p>
                    <p class="box-info__data">{{ $pacient->sintomas_respiratorios ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Peso</p>
                    <p class="box-info__data">{{ $pacient->peso}} KG</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Talla</p>
                    <p class="box-info__data">{{ $pacient->talla}} m</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Circunferencía</p>
                    <p class="box-info__data">{{ $pacient->circunferencia}} cm</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">IMC</p>
                    <p class="box-info__data">{{ $pacient->imc}}</p>
                </div>
            </div>
        </div>
        <div class="health box-info">
            <h5 class="box-info__title">Salud</h5>
            <div class="box-info__section">
                <div class="box-info__data-content">
                    <p class="box-info__label">Presión arterial (Diastolica)</p>
                    <p class="box-info__data">{{ $pacient->arterial_diastolica }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Presión arterial (Sistolica)</p>
                    <p class="box-info__data">{{ $pacient->arterial_sistolica }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Frecuencia Cardiaca</p>
                    <p class="box-info__data">{{ $pacient->frecuencia_cardiaca }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Frecuencia respiratoria</p>
                    <p class="box-info__data">{{ $pacient->frecuencia_respiratoria }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Temperatura</p>
                    <p class="box-info__data">{{ $pacient->temperatura }} °C</p>
                </div>
            </div>
        </div>
        <div class="prediagnostic box-info">
            <h5 class="box-info__title">Prediagnóstico</h5>
            <div class="box-info__section">
                <div class="box-info__data-content">
                    <p class="box-info__label">Saturación oxigeno</p>
                    <p class="box-info__data">{{ $pacient->saturacion_oxigeno }} %</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Glucosa y ayuno</p>
                    <p class="box-info__data">{{ $pacient->glucosa_ayuno }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Posible TB signos y sintomas</p>
                    <p class="box-info__data">{{ $pacient->tb_sintomas ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content box-info__data-content--wide">
                    <p class="box-info__label">Discapacidades</p>
                    <p class="box-info__data">{{ $pacient->discapacidad }}</p>
                </div>
                @if(!$pacient->cl_personal_id_medical)
                    <div class="box-info__data-content box-info__data-content--wide box-info__data-content--wide__button">
                        <div class="form__input-box">
                            <a class="form__input form__input-button" href="/medical_history/{{ $pacient->id }}/edit">Diagnosticar</a>
                        </div> 
                    </div>
                @endif
            </div>
        </div>
        @if($pacient->cl_personal_id_medical)
        <div class="diagnostic box-info">
            <h5 class="box-info__title">Diagnóstico</h5>
            <div class="box-info__section">
                <div class="box-info__data-content box-info__data-content--wide">
                    <p class="box-info__label">Diagnóstico</p>
                    <p class="box-info__data">{!! nl2br($pacient->diagnostico) !!}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Enfermedad crónica</p>
                    <p class="box-info__data">{{ $pacient->enfermedad_cronica ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Consulta integral</p>
                    <p class="box-info__data">{{ $pacient->consulta_integral ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Resistencia insulina</p>
                    <p class="box-info__data">{{ $pacient->resistencia_insulina ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Nutrición</p>
                    <p class="box-info__data">{{ $pacient->nutricion ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Actividad física</p>
                    <p class="box-info__data">{{ $pacient->act_fisica ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Psicología</p>
                    <p class="box-info__data">{{ $pacient->psicologia ? 'Si' : 'No'}}</p>
                </div>
            </div>
        </div>
        <div class="diagnostic box-info">
            <h5 class="box-info__title">Seguimiento del paciente</h5>
            <div class="box-info__section">
                <div class="box-info__data-content">
                    <p class="box-info__label">Ultimo laboratorio</p>
                    <p class="box-info__data">{{ $pacient->ultimos_lab }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Medicina interna</p>
                    <p class="box-info__data">{{ $pacient->medicina_interna ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Especialidad</p>
                    <p class="box-info__data">{{ $pacient->specialty->name}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Niño sano</p>
                    <p class="box-info__data">{{ $pacient->nino_sano ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Adulto mayor</p>
                    <p class="box-info__data">{{ $pacient->adulto_mayor ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Trimestre (Embarazo)</p>
                    <p class="box-info__data">{{ $pacient->trimestre}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Consulta prenatal (Embarazo)</p>
                    <p class="box-info__data">{{ $pacient->consulta_prenatal}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Riesgo (Embarazo)</p>
                    <p class="box-info__data">{{ $pacient->riesgo ? 'Si' : 'No'}}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Fecha (Próxima cita)</p>
                    <p class="box-info__data">{{ $pacient->fecha }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Laboratorios (Próxima cita)</p>
                    <p class="box-info__data">{{ $pacient->labs }}</p>
                </div>
                <div class="box-info__data-content">
                    <p class="box-info__label">Estudios (Próxima cita)</p>
                    <p class="box-info__data">{{ $pacient->estudios}}</p>
                </div>
            </div>
        </div>
        @endif
    </section>
</main>
@endsection

@section('footer')
<script src="{{ asset('assets/js/medicalHistory.js')}}" type="module"></script>
@endsection