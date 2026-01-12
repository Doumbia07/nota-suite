@extends('layouts.app')
@section('title','Clients')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Clients</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Nouveau client</a>
</div>

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
<a href="{{ route('clients.show',$client) }}" class="btn btn-sm btn-info">Voir</a>
<a href="{{ route('clients.edit',$client) }}" class="btn btn-sm btn-warning">Modifier</a>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
