@extends('layouts.app')
@section('title','Client')

@section('content')
<h2>{{ $client->nom }}</h2>
<p>Email : {{ $client->email }}</p>
<p>Téléphone : {{ $client->telephone }}</p>
@endsection
