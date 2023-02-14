<?php

namespace App\Http\Controllers\Admin;

use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterielController extends Controller
{
    public function index()
    {
        $materiels = Materiel::orderBy('id','DESC')->get();
        return view('admin.materiel.index', compact('materiels'));
    }

    public function create()
    {
        $fournisseur = Fournisseur::orderBy('nom', 'ASC')->get();
        return view('admin.materiel.create', compact('fournisseur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'fournisseur' => 'required',
            'model' => 'required',
            'stock' => 'required',
            'date_entre' => 'required',
            'marque' => 'required',
            'serie' => 'required',
            'type' => 'required',
            'etat' => 'required',
        ]);

        $materiel = new Materiel;
        $materiel->fournisseur_id = $request->fournisseur;
        $materiel->marque = $request->marque;
        $materiel->model = $request->model;
        $materiel->serie = $request->serie;
        $materiel->type = $request->type;
        $materiel->quantite = $request->stock;
        $materiel->date_entrer = $request->date_entre;
        $materiel->save();

        return redirect('admin/materiel')->with('success','Materiel Ajouté avec success');
    }

    public function edit($id)
    {
        $materiel = Materiel::find($id);
        $fournisseur = Fournisseur::orderBy('nom', 'ASC')->get();
        return view('admin.materiel.edit',compact('materiel','fournisseur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marque' => 'required',
            'fournisseur' => 'required',
            'model' => 'required',
            'stock' => 'required',
            'date_entre' => 'required',
            'marque' => 'required',
            'serie' => 'required',
            'type' => 'required',
        ]);

        $materiel = Materiel::find($id);
        $materiel->fournisseur_id = $request->fournisseur;
        $materiel->marque = $request->marque;
        $materiel->model = $request->model;
        $materiel->serie = $request->serie;
        $materiel->type = $request->type;
        $materiel->quantite = $request->stock;
        $materiel->date_entrer = $request->date_entre;
        $materiel->update();

        return redirect('admin/materiel')->with('success','Materiel Modifié avec success');
    }

    public function delete($id)
    {
        $materiel = Materiel::find($id);
        $materiel->delete();

        return redirect('admin/materiel')->with('success','Materiel Supprimé avec success');
    }
}
