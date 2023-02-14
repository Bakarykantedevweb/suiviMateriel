<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MaterielRecuperer;
use App\Http\Controllers\Controller;

class MaterielRecupererController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('m');
        $materielrecuperer = MaterielRecuperer::when($request->date != null, function ($q) use ($request) {

            return $q->whereMonth('date_entrer', $request->date);
        }, function ($q) use ($todayDate) {

            return $q->whereMonth('date_entrer', $todayDate);
        })->get();
        $departements = Departement::all();
        return view('admin.recuperer.index',compact('materielrecuperer','departements'));
    }

    public function create()
    {
        $departements = Departement::all();
        return view('admin.recuperer.create',compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departement' => 'required',
            'model' => 'required',
            'date_entre' => 'required',
            'marque' => 'required',
            'serie' => 'required',
            'type' => 'required',
            'etat' => 'required',
        ]);

        $materielrecuperer = new MaterielRecuperer;
        $materielrecuperer->departement_id = $request->departement;
        $materielrecuperer->marque = $request->marque;
        $materielrecuperer->model = $request->model;
        $materielrecuperer->serie = $request->serie;
        $materielrecuperer->type = $request->type;
        $materielrecuperer->description = $request->description;
        $materielrecuperer->date_entrer = $request->date_entre;
        $materielrecuperer->etat = $request->etat;
        $materielrecuperer->save();
        return redirect('admin/materiel/recuperer')->with('success','Materiel Ajouté avec success');
    }

    public function rapport()
    {
        $materielrecuperer = MaterielRecuperer::all();
        return view('admin.recuperer.rapport',compact('materielrecuperer'));
    }

    public function detail($id)
    {
        $materieldetail = MaterielRecuperer::find($id);
        return view('admin.recuperer.detail',compact('materieldetail'));
    }

    public function edit($id)
    {
        $departements = Departement::all();
        $materieldetail = MaterielRecuperer::find($id);
        return view('admin.recuperer.edit',compact('materieldetail','departements'));
    }
}
