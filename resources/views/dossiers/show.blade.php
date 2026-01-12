@extends('layouts.app')
@section('title','Dossier')

@section('content')
<h2>Dossier : {{ $dossier->reference }}</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>Client :</strong> {{ $dossier->client->nom }}</li>
    <li class="list-group-item"><strong>Statut :</strong> {{ $dossier->statut }}</li>
    <li class="list-group-item"><strong>Créé le :</strong> {{ $dossier->created_at->format('d/m/Y') }}</li>
</ul>

<a href="{{ route('dossiers.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection
