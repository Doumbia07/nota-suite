@extends('layouts.app')
@section('title','Modifier dossier')

@section('content')
<h2>Modifier le dossier</h2>

<form method="POST" action="{{ route('dossiers.update',$dossier) }}">
@csrf @method('PUT')

<div class="mb-3">
    <label class="form-label">Référence</label>
    <input class="form-control" name="reference" value="{{ $dossier->reference }}">
</div>

<div class="mb-3">
    <label class="form-label">Statut</label>
    <select class="form-control" name="statut">
        <option {{ $dossier->statut=='Ouvert'?'selected':'' }}>Ouvert</option>
        <option {{ $dossier->statut=='En cours'?'selected':'' }}>En cours</option>
        <option {{ $dossier->statut=='Clôturé'?'selected':'' }}>Clôturé</option>
    </select>
</div>

<button class="btn btn-primary">Modifier</button>
</form>
@endsection
