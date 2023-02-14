<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('admin.departement.index',compact('departements'));
    }

    public function create()
    {
        return view('admin.departement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_departement' => 'required'
        ]);

        $departement = new Departement;
        $departement->nom = $request->nom_departement;
        $departement->save();
        return redirect('admin/departement')->with('success','Departement ajoutée avec success');
    }

    public function edit($id)
    {
        $departement = Departement::find($id);
        return view('admin.departement.edit',compact('departement'));
    }

    public function update(Request $request ,$id)
    {
        $request->validate([
            'nom_departement' => 'required'
        ]);

        $departement = Departement::find($id);
        $departement->nom = $request->nom_departement;
        $departement->update();
        return redirect('admin/departement')->with('success','Departement modifié avec success');
    }

    public function delete($id)
    {
        $departement = Departement::find($id);
        $departement->delete();
        return redirect('admin/departement')->with('success','Departement supprimé avec success');
    }
}
