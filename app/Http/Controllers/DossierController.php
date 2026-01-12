<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Dossier;

class DossierController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::with('client')->get();
        return view('dossiers.index', compact('dossiers'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('dossiers.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'reference' => 'required|unique:dossiers,reference',
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'statut' => 'required',
        ]);

        Dossier::create($request->all());

        return redirect()->route('dossiers.index')->with('success', 'Dossier créé avec succès');
    }

    public function show($id)
    {
        $dossier = Dossier::findOrFail($id);
        return view('dossiers.show', compact('dossier'));
    }

    public function edit($id)
    {
        $dossier = Dossier::findOrFail($id);
        $clients = Client::all();
        return view('dossiers.edit', compact('dossier','clients'));
    }

    public function update(Request $request, $id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier->update($request->all());

        return redirect()->route('dossiers.index')->with('success','Dossier mis à jour');
    }

    public function destroy($id)
    {
        Dossier::destroy($id);
        return redirect()->route('dossiers.index')->with('success','Dossier supprimé');
    }
}
