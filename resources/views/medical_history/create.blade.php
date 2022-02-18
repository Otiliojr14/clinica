@extends('layout.admin')

@section('title')
    Registrar paciente
@endsection

@section('content')
<main class="create-admin">
    <h4 class="title-page">Registro de paciente</h4>
    <section class="form form-admin">
        <form action="post" class="form__data" id="form__create-medical">
            @csrf
            <input type="hidden" name="_token" class="form__token" value="{{ csrf_token() }}">
            <div class="form__header">
                <p class="identificacion activeLabel form__title-section">Identificación</p>
                <p class="fisico form__title-section">Físico</p>
                <p class="salud form__title-section">Salud</p>
                <p class="registro form__title-section">Registro</p>
            </div>
            <article class="identificacion form__article">
                <h5>Datos de identificación</h5>
                <div class="form__input-box">
                    <label for="matricula" class="form__label">Matrícula del empleado</label>
                    <input type="text" class="form__input" name="matricula" id="matricula">
                </div>
                <div class="form__input-box">
                    <label for="no_beneficiario" class="form__label">No. de beneficiario</label>
                    <input type="text" class="form__input" name="no_beneficiario" id="no_beneficiario">
                </div>
                <div class="form__input-box form__input-box-categoria">
                    <label for="categoria">Categoria</label>
                    <p></p>
                </div>
                <div class="form__input-box form__input-box-nombre">
                    <label for="categoria">Nombre</label>
                    <p></p>
                </div>
                <div class="form__input-box form__input-box-telefono">
                    <label for="categoria">Telefono</label>
                    <p></p>
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="fisico" class="form__input form__input-button form__input-button-first">Siguiente</button>
                </div>                  
            </article>
            <article class="fisico invisible form__article">
                <h5>Prediagnostico físico</h5>
                <div class="form__input-box">
                    <label for="sintomas_respiratorios" class="form__label">Sintomas respiratorios</label>
                    <input type="text" class="form__input" name="sintomas_respiratorios" id="sintomas_respiratorios">
                </div>
                <div class="form__input-box">
                    <label for="peso" class="form__label">Peso (KG)</label>
                    <input type="text" class="form__input" name="peso" id="peso">
                </div>
                <div class="form__input-box">
                    <label for="talla" class="form__label">Talla</label>
                    <input type="text" class="form__input" name="talla" id="talla">
                </div>
                <div class="form__input-box">
                    <label for="circunferencia" class="form__label">Circunferencia</label>
                    <input type="text" class="form__input" name="circunferencia" id="circunferencia">
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="identificacion" class="form__input form__input-button">Regresar</button>
                    <button type="button" value="salud" class="form__input form__input-button">Siguiente</button>
                </div>                  
            </article>
            <article class="salud invisible form__article">
                <h5>Prediagnostico de salud</h5>
                <div class="form__input-box">
                    <label for="arterial_diastolica" class="form__label">Presión arterial (Diastolica)</label>
                    <input type="text" class="form__input" name="arterial_diastolica" id="arterial_diastolica">
                </div>
                <div class="form__input-box">
                    <label for="arterial_sistolica" class="form__label">Presión arterial (Sistolica)</label>
                    <input type="text" class="form__input" name="arterial_sistolica" id="arterial_sistolica">
                </div>
                <div class="form__input-box">
                    <label for="frecuencia_cardiaca" class="form__label">Frecuencia cardiaca</label>
                    <input type="text" class="form__input" name="frecuencia_cardiaca" id="frecuencia_cardiaca">
                </div>
                <div class="form__input-box">
                    <label for="frecuencia_respiratoria" class="form__label">Frecuencia respiratoria</label>
                    <input type="text" class="form__input" name="frecuencia_respiratoria" id="frecuencia_respiratoria">
                </div>
                <div class="form__input-box">
                    <label for="circunferencia" class="form__label">Diagnóstico de temperatura</label>
                    <div class="form__radio-box">
                        <div class="form__radio-option">
                            <input type="radio" name="temperatura" id="temperatura_si" value="1" class="form__radio-input" />
                            <label for="temperatura_si">Sí</label>
                        </div>
                        <div class="form__radio-option">
                            <input type="radio" name="temperatura" id="temperatura_no" value="0" class="form__radio-input" />
                            <label for="temperatura_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="form__input-box">
                    <label for="temperatura" class="form__label">¿Cuál es la temperatura?</label>
                    <input type="text" class="form__input" name="temperatura" id="temperatura">
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="fisico" class="form__input form__input-button">Regresar</button>
                    <button type="button" value="registro" class="form__input form__input-button">Siguiente</button>
                </div>                  
            </article>
            <article class="registro invisible form__article">
                <h5>Registro</h5>
                <div class="form__input-box">
                    <label for="saturacion_oxigeno" class="form__label">Saturación de oxigeno</label>
                    <div class="form__radio-box">
                        <div class="form__radio-option">
                            <input type="radio" name="saturacion_oxigeno" id="saturacion_oxigeno_si" value="1" class="form__radio-input" />
                            <label for="saturacion_oxigeno_si">Sí</label>
                        </div>
                        <div class="form__radio-option">
                            <input type="radio" name="saturacion_oxigeno" id="saturacion_oxigeno_no" value="0" class="form__radio-input" />
                            <label for="saturacion_oxigeno_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="form__input-box">
                    <label for="glucosa_ayuno" class="form__label">Glucosa y ayuno</label>
                    <div class="form__radio-box">
                        <div class="form__radio-option">
                            <input type="radio" name="glucosa_ayuno" id="glucosa_ayuno_si" value="1" class="form__radio-input" />
                            <label for="glucosa_ayuno_si">Sí</label>
                        </div>
                        <div class="form__radio-option">
                            <input type="radio" name="glucosa_ayuno" id="glucosa_ayuno_no" value="0" class="form__radio-input" />
                            <label for="glucosa_ayuno_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="form__input-box">
                    <label for="tb_sintomas" class="form__label">Posible TB signos y sintomas</label>
                    <div class="form__radio-box">
                        <div class="form__radio-option">
                            <input type="radio" name="tb_sintomas" id="tb_sintomas_si" value="1" class="form__radio-input" />
                            <label for="tb_sintomas_si">Sí</label>
                        </div>
                        <div class="form__radio-option">
                            <input type="radio" name="tb_sintomas" id="tb_sintomas_no" value="0" class="form__radio-input" />
                            <label for="tb_sintomas_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="form__input-box">
                    <label for="imc" class="form__label">IMC</label>
                    <input type="text" class="form__input" name="imc" id="imc">
                </div>
                <div class="form__input-box">
                    <label for="discapacidad" class="form__label">Discapacidades</label>
                    <textarea name="discapacidad" id="discapacidad" class="form__textarea"></textarea>
                </div>
                <div class="form__input-box form__input-box--last form__input-buttons">
                    <button type="button" value="salud" class="form__input form__input-button">Regresar</button>
                    <input type="submit" value="Registrar" class="form__input form__input-button">
                </div>                  
            </article>
        </form>
    </section>
</main>
@endsection

@section('footer')
<script src="{{ asset('assets/js/createMedical.js')}}" type="module"></script>
@endsection