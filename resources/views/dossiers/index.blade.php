@extends('layouts.app')
@section('title','Dossiers')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Dossiers</h2>
    <a href="{{ route('dossiers.create') }}" class="btn btn-primary">Ouvrir un dossier</a>
</div>

<table class="table table-bordered bg-white">
<thead>
<tr>
    <th>Référence</th>
    <th>Client</th>
    <th>Statut</th>
    <th>Créé le</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($dossiers as $dossier)
<tr>
    <td>{{ $dossier->reference }}</td>
    <td>{{ $dossier->client->nom }}</td>
    <td>
        <span class="badge bg-secondary">{{ $dossier->statut }}</span>
    </td>
    <td>{{ $dossier->created_at->format('d/m/Y') }}</td>
    <td>
        <a href="{{ route('dossiers.show',$dossier) }}" class="btn btn-sm btn-info">Voir</a>
        <a href="{{ route('dossiers.edit',$dossier) }}" class="btn btn-sm btn-warning">Modifier</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
