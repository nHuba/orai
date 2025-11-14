@extends('layout.app')
@section('title', ' | Teszt oldal')


@section('content')

       <div class="jumbotron">
            <h1>Yo big dawg</h1>
            <p class="lead">Ez az első domu rout-unk!</p>
            <a href="https://szbi-pg.hu" class="btn btn-lg btn-primary" role="button">Suli</a>
            <p>{{ date('Y-m-d H:i:s') }}</p>
            <p>{{  $randomName }}</p>
        </div>

@endsection