<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('admin.fournisseur.index',compact('fournisseurs'));
    }

    public function create()
    {
        return view('admin.fournisseur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required'
        ]);

        $fournisseur = new Fournisseur;
        $fournisseur->nom = $request->nom_fournisseur;
        $fournisseur->save();
        return redirect('admin/fournisseur')->with('success','Fournisseur Ajouté avec Success');
    }
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('admin.fournisseur.edit', compact('fournisseur'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required'
        ]);

        $fournisseur = Fournisseur::find($id);
        $fournisseur->nom = $request->nom_fournisseur;
        $fournisseur->update();
        return redirect('admin/fournisseur')->with('success','Fournisseur Modifié avec Success');
    }

    public function delete($id)
    {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->delete();
        return redirect('admin/fournisseur')->with('success','Fournisseur Supprimé avec Success');
    }
}
