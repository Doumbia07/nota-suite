@extends('layouts.app')
@section('title','Co-contactants')

@section('content')
<h2>Co-contactants du dossier {{ $dossier->reference }}</h2>

<form method="POST" action="{{ route('dossiers.cocontactants.store',$dossier) }}">
@csrf
<input name="nom" class="form-control mb-2" placeholder="Nom">
<input name="telephone" class="form-control mb-2" placeholder="Téléphone">
<button class="btn btn-primary">Ajouter</button>
</form>

<hr>

<ul>
@foreach($dossier->coContactants as $c)
<li>{{ $c->nom }} — {{ $c->telephone }}</li>
@endforeach
</ul>
@endsection
