@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')
<main class="login">
    <section class="form">
        <figure class="form__img-box">
            <img src="{{ asset('assets/img/logodamr.png') }}" alt="Logo universidad" class="form__img">
        </figure>
        <h5 class="form__title">Clínica</h5>
        <form action="post" class="form__data" id="form__login">
            @csrf
            <input type="hidden" name="_token" class="form__token" value="{{ csrf_token() }}">
            <div class="form__input-box">
                <label for="matricula" class="form__label">Matrícula</label>
                <input type="text" class="form__input" name="matricula" id="matricula">
            </div>
            <div class="form__input-box">
                <label for="password" class="form__label">Contraseña</label>
                <input type="password" class="form__input" name="password" id="password">
            </div>
            <div class="form__input-box">
                <label for="tipo_usuario" class="form__label">Tipo de usuario</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form__input">
                    <option value="">Seleccione el tipo de usuario</option>
                    <option value="1">Médico</option>
                    <option value="2">Enfermero</option>
                </select>
            </div>
            <div class="form__input-box form__input-box--last">
                <input type="submit" value="Ingresar" class="form__input form__input-button">
            </div>            
        </form>
    </section>
</main>
@endsection

@section('footer')
<script src="{{ asset('assets/js/login.js')}}" type="module"></script>
@endsection


