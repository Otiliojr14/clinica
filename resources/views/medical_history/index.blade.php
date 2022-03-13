@extends('layout.admin')

@section('title')
    Lista de pacientes
@endsection

@section('content')

<main class="show-admin">
    <section class="control">
        <article class="control__option sala-espera active">
            <h5 class="control__title">Sala de espera</h5>
            <img class="control__icon" src="{{ asset('assets/img/svg/arrow-icon.svg') }}">
        </article>
        <article class="control__option registros-completados">
            <h5 class="control__title">Registros completos</h5>
            <img class="control__icon" src="{{ asset('assets/img/svg/arrow-icon.svg') }}">
        </article>
    </section>
    <section class="display-list">
        <section class="sala-espera">
            @foreach($medical_records as $medical_record)
                @if(!$medical_record->cl_personal_id_medical)
                <article class="record-row">
                    <div class="record-row__content">
                        <h5 class="record-row__title">Paciente: <span>{{ $medical_record->unv_personal->nombre }} {{ $medical_record->unv_personal->apellido }}</span></h5>
                        <p class="record-row__label"><span>Enfermero:</span> {{$medical_record->cl_personal_nurse->unv_personal->nombre}} {{$medical_record->cl_personal_nurse->unv_personal->apellido}}</p>
                    </div>
                    <div class="record-row__action">
                        <div class="form__input-box">
                            <a class="form__input form__input-button" href="/medical_history/{{ $medical_record->id }}">Revisar</a>
                        </div> 
                    </div>
                </article>
                @endif
            @endforeach
        </section>
        <section class="registros-completados" style="display: none;">
            @foreach($medical_records as $medical_record)
                @if($medical_record->cl_personal_id_medical)
                <article class="record-row">
                    <div class="record-row__content">
                        <h5 class="record-row__title">Paciente: <span>{{ $medical_record->unv_personal->nombre }} {{ $medical_record->unv_personal->apellido }}</span></h5>
                        <p class="record-row__label"><span>Enfermero:</span> {{$medical_record->cl_personal_nurse->unv_personal->nombre}} {{$medical_record->cl_personal_nurse->unv_personal->apellido}}</p>
                    </div>
                    <div class="record-row__action">
                        <div class="form__input-box">
                            <a class="form__input form__input-button" href="/medical_history/{{ $medical_record->id }}">Revisar</a>
                        </div> 
                    </div>
                </article>
                @endif
            @endforeach
        </section>
    </section>
</main>

@endsection

@section('footer')
<script src="{{ asset('assets/js/medicalHistory.js')}}" type="module"></script>
@endsection