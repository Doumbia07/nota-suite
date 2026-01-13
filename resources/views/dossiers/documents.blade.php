@extends('layouts.app')
@section('title','Documents')

@section('content')
<h2>Documents du dossier {{ $dossier->reference }}</h2>

<form method="POST" action="{{ route('dossiers.documents.store',$dossier) }}" enctype="multipart/form-data">
@csrf
<input name="nom" class="form-control mb-2" placeholder="Nom du document">
<input type="file" name="fichier" class="form-control mb-2">
<button class="btn btn-secondary">Uploader</button>
</form>

<hr>

<ul>
@foreach($dossier->documents as $doc)
<li><a href="{{ asset('storage/'.$doc->fichier) }}" target="_blank">{{ $doc->nom }}</a></li>
@endforeach
</ul>
@endsection
