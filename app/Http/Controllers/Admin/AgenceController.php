<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgenceController extends Controller
{
    public function index()
    {
        $agences = Agence::orderBy('nom', 'ASC')->get();
        return view('admin.agence.index',compact('agences'));
    }

    public function create()
    {
        return view('admin.agence.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_agence' => 'required'
        ]);

        $agence = new Agence;
        $agence->nom = $request->nom_agence;
        $agence->save();
        return redirect('admin/agence')->with('success','Agence ajoutée avec success');
    }

    public function edit($id)
    {
        $agence = Agence::find($id);
        return view('admin.agence.edit',compact('agence'));
    }

    public function update(Request $request, $id)
    {
        $agence = Agence::find($id);
        $agence->nom = $request->nom_agence;
        $agence->update();
        return redirect('admin/agence')->with('success','Agence modifiée avec success');
    }

    public function delete($id)
    {
        $agence = Agence::find($id);
        $agence->delete();
        return redirect('admin/agence')->with('success','Agence supprimée avec success');
    }
}
