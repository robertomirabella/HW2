@extends('layouts.main')

@section('style')
<title>Gestione Zoo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">     
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/mhw1.css">
<link rel="stylesheet" href="css/mhw2.css">

<script src="scripts/gestione_animali.js" defer></script>
<script src="scripts/mhw3_pet.js" defer></script>
@endsection

@section('title')
<h1>Tutti i nostri animali</h1>
@endsection


@section('content')

<article>
    <section id='lista_preferiti' class='hidden'>
        <div>
            <h2>
                Preferiti
            </h2>
        </div>
    </section>
    <section class="contents_preferiti hidden">
    </section>
    <section>
        <div>
            <h2>
                Lista Animali
            </h2>
        </div>
        <div id="contenitore_input">
            <strong id="cerca">Cerca</strong>
            <input type='text'>
        </div>
    </section>
    
    <section class="contents"></section>

    <section id="adozione">
        <label>Se anche tu hai a cuore la vita degli animali adottane uno!:<select name = 'tipo' id='tipo'>
            <option value="vuoto"></option>
            <option value='cani'>Cani</option>
            <option value='cavalli'>Cavalli</option>
            <option value='gatti'>Gatti</option>
            <option value="volatili">Volatili</option>
        </select></label>
    </section>
    <section id="elenco_pet"></section>
</article>   

@endsection