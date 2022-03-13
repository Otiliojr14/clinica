@extends('layout.admin')

@section('title')
    Editar paciente
@endsection

@section('content')
<main class="edit-admin">
    <h4 class="title-page">Diagnosticar paciente</h4>
    <section class="form form-admin">
        <form action="/medical_history" class="form__data" id="form__edit-medical" method="post">
            @csrf
            <h5 class="form__title--paciente">{{$pacient->unv_personal->nombre}} {{$pacient->unv_personal->apellido}}</h5>
            <input type="hidden" name="id_doctor" id="id_doctor" value="{{Session::get($session_name)->cl_personal->unv_personal_id}}">
            <input type="hidden" name="id_medical_history" id="id_medical_history" value="{{$pacient->id}}">
            <div class="form__header">
                <p class="diagnostico-window activeLabel form__title-section">Diagnostico</p>
                <p class="seguimiento form__title-section">Seguimiento</p>
                <p class="registro form__title-section">Registro</p>
            </div>
            <article class="diagnostico-window form__article">
                <h5>Diagnóstico del paciente</h5>
                <div class="form__input-box">
                    <label for="diagnostico" class="form__label">Diagnóstico</label>
                    <textarea name="diagnostico" id="diagnostico" class="form__textarea"></textarea>
                </div>
                <div class="form__input-box">
                    <label for="enfermedad_cronica" class="form__label">Enfermedad crónica</label>
                    <select name="enfermedad_cronica" id="enfermedad_cronica" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="consulta_integral" class="form__label">Consulta integral</label>
                    <select name="consulta_integral" id="consulta_integral" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="resistencia_insulina" class="form__label">Resistencia insulina</label>
                    <select name="resistencia_insulina" id="resistencia_insulina" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="nutricion" class="form__label">Nutrición</label>
                    <select name="nutricion" id="nutricion" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="act_fisica" class="form__label">Actividad física</label>
                    <select name="act_fisica" id="act_fisica" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="psicologia" class="form__label">Psicología</label>
                    <select name="psicologia" id="psicologia" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="seguimiento" class="form__input form__input-button form__input-button-first" id="button-identification" >Siguiente</button>
                </div>                  
            </article>
            <article class="seguimiento invisible form__article">
                <h5>Seguimiento del paciente</h5>
                <div class="form__input-box">
                    <label for="ultimos_lab" class="form__label">Ultimo laboratorio</label>
                    <input type="date" name="ultimos_lab" class="form__input" id="ultimos_lab">
                </div>
                <div class="form__input-box">
                    <label for="medicina_interna" class="form__label">Medicina interna</label>
                    <select name="medicina_interna" id="medicina_interna" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="specialty_id" class="form__label">Especialidad</label>
                    <select name="specialty_id" id="specialty_id" class="form__input">
                        <option value="">Elige especialidad</option>
                        @foreach($specialties as $specialty)
                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="nino_sano" class="form__label">Niño sano</label>
                    <select name="nino_sano" id="nino_sano" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="adulto_mayor" class="form__label">Adulto mayor</label>
                    <select name="adulto_mayor" id="adulto_mayor" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="diagnostico-window" class="form__input form__input-button">Regresar</button>
                    <button type="button" value="registro" class="form__input form__input-button" id="button-fisico">Siguiente</button>
                </div>                  
            </article>
            <article class="registro invisible form__article">
                <h5>Registro</h5>
                <div class="form__input-box">
                    <label for="trimestre" class="form__label">Trimestre (Embarazo)</label>
                    <input type="number" step="1" min="0" max="4" class="form__input" name="trimestre" id="trimestre">
                </div>
                <div class="form__input-box">
                    <label for="consulta_prenatal" class="form__label">N. Consulta Prenatal (Embarazo)</label>
                    <input type="number" class="form__input" name="consulta_prenatal" id="consulta_prenatal">
                </div>
                <div class="form__input-box">
                    <label for="riesgo" class="form__label">Riesgo (Embarazo)</label>
                    <select name="riesgo" id="riesgo" class="form__input">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div class="form__input-box">
                    <label for="fecha" class="form__label">Fecha (Próxima cita)</label>
                    <input type="date" name="fecha" class="form__input" id="fecha">
                </div>
                <div class="form__input-box">
                    <label for="labs" class="form__label">Laboratorios (Próxima cita)</label>
                    <input type="text" name="labs" class="form__input" id="labs">
                </div>
                <div class="form__input-box">
                    <label for="estudios" class="form__label">Estudios (Próxima cita)</label>
                    <input type="text" name="estudios" class="form__input" id="estudios">
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="seguimiento" class="form__input form__input-button">Regresar</button>
                    <input type="submit" value="Registrar" class="form__input form__input-button--send" id="button-send">
                </div>                  
            </article>
        </form>
    </section>
</main>
@endsection

@section('footer')
<script src="{{ asset('assets/js/medicalHistoryEdit.js')}}" type="module"></script>
@endsection