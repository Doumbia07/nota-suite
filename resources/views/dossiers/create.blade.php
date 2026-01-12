@extends('layouts.app')
@section('title','Ouvrir un dossier')

@section('content')
<h2>Ouvrir un nouveau dossier</h2>

<form method="POST" action="{{ route('dossiers.store') }}">
@csrf

<div class="mb-3">
    <label class="form-label">Référence</label>
    <input class="form-control" name="reference" required>
</div>

<div class="mb-3">
    <label class="form-label">Client</label>
    <select class="form-control" name="client_id" required>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nom }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Date</label>
    <input type="date" class="form-control" name="date" required>
</div>

<div class="mb-3">
    <label class="form-label">Montant</label>
    <input type="number" step="0.01" class="form-control" name="montant" required>
</div>

<div class="mb-3">
    <label class="form-label">Statut</label>
    <select class="form-control" name="statut">
        <option value="Ouvert">Ouvert</option>
        <option value="En cours" selected>En cours</option>
        <option value="Clôturé">Clôturé</option>
    </select>
</div>

<button class="btn btn-success">Créer le dossier</button>
</form>
@endsection
