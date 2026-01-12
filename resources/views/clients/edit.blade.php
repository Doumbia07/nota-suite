@extends('layouts.app')
@section('title','Modifier client')

@section('content')
<h2>Modifier client</h2>

<form method="POST" action="{{ route('clients.update',$client) }}">
@csrf @method('PUT')
<input class="form-control mb-2" name="nom" value="{{ $client->nom }}">
<input class="form-control mb-2" name="email" value="{{ $client->email }}">
<input class="form-control mb-2" name="telephone" value="{{ $client->telephone }}">
<button class="btn btn-primary">Modifier</button>
</form>
@endsection
