@extends('layouts.portale')

@section('style')
<title>Gestione Zoo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">     
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/mhw1.css">
<link rel="stylesheet" href="css/portale.css">
<script src="scripts/portale_dipendenti.js" defer></script>
@endsection

@section('title')
<h1>
    Area dipendenti
</h1>
@endsection

@section('content')
<article>
        <section class="anagrafica">
            <div>
                <h2></h2>
                <p></p>
            </div>
        </section>
        <section class="box">
            <h2>Gestione Recinti</h2>
            <form name="recinti">
                <div class="Table" id="recinti"></div>
                <span class="error hidden">Inserire Tutti i campi</span>
                <input type="hidden" name="tipo" value="recinti">
                <input type="submit" value="Invia" class='submit'>
            </form>
            <form name="animali_acquatici">
                <h2>Gestione Animali acquatici</h2>
                <div class="Table" id="animali_acquatici"></div>
                <span class="error hidden">Inserire Tutti i campi</span>
                <input type="hidden" name="tipo" value="animali_acquatici">
                <input type="submit" value="Invia" class='submit'>
            </form>
            <h2>Gestione Animali terrestri</h2>
            <form name="animali_terrestri">
                <div class="Table" id="animali_terrestri"></div>
                <span class="error hidden">Inserire Tutti i campi</span>
                <input type="hidden" name="tipo" value="animali_terrestri">
                <input type="submit" value="Invia" class='submit'>
         </form>    
        </section>
    </article>
@endsection
