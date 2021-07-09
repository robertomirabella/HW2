@extends('layouts.main')

@section('style')
<title>Gestione Zoo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">     
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('css/mhw1.css')}}">
<link rel="stylesheet" href="{{url('css/login.css')}}">
<script src="{{url('scripts/login.js')}}" defer></script>
@endsection

@section('title')
<h1>
    Sign up / Login
</h1>
@endsection

@section('content')
<article>
    <div>
        <h3>Area dedicata ai dipendenti dei vari zoo</h3>
        <h3>Per effetuare la registrazione bisogna prima rivolgersi al personale informatico</h3>
            @if (isset($error1))
                <span class='error'>"{{$error1}}"</span>
            @endif
    </div>
    <section class="box">

            <div class="login">
                <h3>Iscriviti</h3>
                <form name='signup' method='post'>
                    <input type="hidden" name="_token" value="{{$csrf_token}}">

                    <div class="codice_fiscale">
                        <div><label for='codice_fiscale'>Codice Fiscale</label></div>
                        <div><input type='text' name='codice_fiscale' value="{{old('codice_fiscale')}}"></div>
                        <span class="hidden error">Codice fiscale non valido</span>
                    </div>
                    <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' value="{{old('email')}}"></div>
                    <span class="hidden error">Indirizzo email non valido</span>
                </div>
                    <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' value="{{old('password')}}"></div>
                    <span class="hidden error">Inserisci almeno 8 caratteri</span>
                </div>
                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' value="{{old('confirm_password')}}"></div>
                    <span class="hidden error">Le password non coincidono</span>
                </div>
                    <div>
                        <input type='submit' value="Iscriviti" class="bottone">
                    </div>
                    <div><input type="hidden" name="tipo" value="signup"></div>
                </form>
            </div>
        
        <section class="spacer">
            <div>
                <span></span>
            </div>
        </section>
        
            <div class="login">
                <h3>Accedi</h3>
                <form name='login' method='post'>
                    <input type="hidden" name="_token" value="{{$csrf_token}}">
                    <div class="email">
                        <div><label for='email'>Email</label></div>
                        <div><input type='text' name='email1' value="{{old('email1')}}"></div>
                    </div>
                    <div class="password">
                        <div><label for='password'>Password</label></div>
                        <div><input type='password' name='password1' value="{{old('password1')}}"></div>
                    </div>
                    <div>
                        <input type='submit' value="Accedi" class="bottone">
                    </div>
                    <div><input type="hidden" name="tipo" value="login"></div>
                </form>
            </div>
        
    </section>
</article>
@endsection
