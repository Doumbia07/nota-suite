<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\CoContactant;
use App\Models\Frais;
use App\Models\Document;

class DossierController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::with('client')->latest()->get();
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

        $dossier = Dossier::create($request->all());

        return redirect()->route('dossiers.cocontactants', $dossier)->with('success', 'Dossier créé. Ajoutez les co-contactants.');
    }

   public function show($id)
    {
    $dossier = Dossier::with(['client','coContactants','frais','documents'])->findOrFail($id);
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

        return redirect()->route('dossiers.show',$dossier)->with('success','Dossier mis à jour');
    }

    public function destroy($id)
    {
        Dossier::destroy($id);
        return redirect()->route('dossiers.index')->with('success','Dossier supprimé');
    }

    // ===============================
    // ÉTAPE 2 — CO-CONTACTANTS
    // ===============================

    public function coContactants(Dossier $dossier)
    {
        return view('dossiers.cocontactants', compact('dossier'));
    }

    public function storeCoContactant(Request $request, Dossier $dossier)
    {
        $request->validate([
            'nom' => 'required|string',
            'telephone' => 'required|string'
        ]);

        $dossier->coContactants()->create($request->all());

        return back()->with('success','Co-contactant ajouté');
    }

    // ===============================
    // ÉTAPE 3 — FRAIS
    // ===============================

    public function frais(Dossier $dossier)
    {
        return view('dossiers.frais', compact('dossier'));
    }

    public function storeFrais(Request $request, Dossier $dossier)
    {
        $request->validate([
            'depot' => 'nullable|numeric',
            'droits' => 'nullable|numeric',
            'honoraires' => 'nullable|numeric',
        ]);

        $dossier->frais()->updateOrCreate([], $request->all());

        return back()->with('success','Frais enregistrés');
    }

    // ===============================
    // ÉTAPE 4 — DOCUMENTS
    // ===============================

    public function documents(Dossier $dossier)
    {
        return view('dossiers.documents', compact('dossier'));
    }

    public function storeDocument(Request $request, Dossier $dossier)
    {
        $request->validate([
            'nom' => 'required|string',
            'fichier' => 'required|file|max:5120'
        ]);

        $path = $request->file('fichier')->store('documents','public');

        $dossier->documents()->create([
            'nom' => $request->nom,
            'fichier' => $path
        ]);

        return back()->with('success','Document ajouté');
    }
}
