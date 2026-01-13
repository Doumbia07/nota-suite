@extends('layouts.app')
@section('title','Frais')

@section('content')
<h2>Frais du dossier {{ $dossier->reference }}</h2>

<form method="POST" action="{{ route('dossiers.frais.store',$dossier) }}">
@csrf
<input name="depot" class="form-control mb-2" placeholder="Dépôt">
<input name="droits" class="form-control mb-2" placeholder="Droits">
<input name="honoraires" class="form-control mb-2" placeholder="Honoraires">
<button class="btn btn-success">Enregistrer</button>
</form>
@endsection
