@extends('layouts.app')
@section('title','Clients')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-3">
    <h2 class="mb-0">Clients</h2>
    <div class="d-flex flex-column flex-sm-row gap-2">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Personne Morale</a>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Personne Physique</a>
    </div>
</div>

<div class="table-responsive">
<table class="table table-bordered bg-white">
<thead>
<tr><th>Nom</th><th>Email</th><th>Téléphone</th><th>Actions</th></tr>
</thead>
<tbody>
@foreach($clients as $client)
<tr>
<td>{{ $client->nom }}</td>
<td>{{ $client->email }}</td>
<td>{{ $client->telephone }}</td>
<td>
<div class="d-flex flex-column flex-sm-row gap-1">
<a href="{{ route('clients.show',$client) }}" class="btn btn-sm btn-info">Voir</a>
<a href="{{ route('clients.edit',$client) }}" class="btn btn-sm btn-warning">Modifier</a>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection