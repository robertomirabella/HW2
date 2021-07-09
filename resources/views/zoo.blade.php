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
<script src="{{url('scripts/carica_zoo.js')}}" defer></script>
<script src="{{url('scripts/mhw3_meteo.js')}}" defer></script>
@endsection

@section('title')
<h1>I nostri Zoo</h1> 
@endsection

@section('content')
<article>
    <section id="meteo">
        <form name ='search_content' id='search_content'>
            <label>Inserire una città per il meteo: <input type='text' name = 'content' id ='content'></label>	 
            <label>&nbsp;<input class="submit" type='submit' value="Vai"></label>
        </form>
        <section id="container_meteo"></section>
    </section>
    <section class='container'></section>
</article>
@endsection