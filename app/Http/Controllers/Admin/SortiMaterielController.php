<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use App\Models\Materiel;
use Illuminate\Http\Request;
use App\Models\SortiMateriel;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class SortiMaterielController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('m');
        $materielsorti = SortiMateriel::when($request->date != null, function ($q) use ($request) {

            return $q->whereMonth('date_sorti', $request->date);
        }, function ($q) use ($todayDate) {

            return $q->whereMonth('date_sorti', $todayDate);
        })->get();
        
        return view('admin.sorti.index', compact('materielsorti'));
    }
    public function create()
    {
        $materiels = Materiel::all();
        $agences = Agence::all();
        return view('admin.sorti.create', compact('materiels', 'agences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agence' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'materiel' => 'required',
            'date_sortie' => 'required',
        ]);

        $materielsorti = new SortiMateriel;
        $materielsorti->agence_id = $request->agence;
        $materielsorti->materiel_id = json_encode($request->materiel);
        $materielsorti->nom = $request->nom;
        $materielsorti->prenom = $request->prenom;
        $materielsorti->date_sorti = $request->date_sortie;
        $materielsorti->save();

        return redirect('admin/sortimateriel')->with('success', 'Sorti effectué avec Success');
    }

    public function print($id)
    {
        $materielsorti = SortiMateriel::find($id);
        return view('admin.sorti.bonsorti', compact('materielsorti'));
    }
}
