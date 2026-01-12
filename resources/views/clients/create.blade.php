@extends('layouts.app')
@section('title','Créer un client')

@section('content')
<h2>Nouveau client</h2>

<form method="POST" action="{{ route('clients.store') }}">
@csrf
<input class="form-control mb-2" name="nom" placeholder="Nom" required>
<input class="form-control mb-2" name="email" placeholder="Email">
<input class="form-control mb-2" name="telephone" placeholder="Téléphone">
<button class="btn btn-success">Enregistrer</button>
</form>
@endsection
