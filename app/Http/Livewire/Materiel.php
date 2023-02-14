<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MaterielRecuperer;
use Illuminate\Support\Facades\Log;

class Materiel extends Component
{

    public $departement, $date_entre, $marque, $model, $serie, $description, $etat, $type, $materiel_id;

    public function editMateriel(int $materiel_id)
    {
        $materieldetail = MaterielRecuperer::find($materiel_id);

        if ($materieldetail) {
            $this->departement = $materieldetail->departement_id;
            $this->marque = $materieldetail->marque;
            $this->model = $materieldetail->model;
            $this->serie = $materieldetail->serie;
            $this->type = $materieldetail->type;
            if ($materieldetail->description) {
                $this->description = $materieldetail->description;
            } else {
                $this->description = "Le Materiel est en bon etat";
            }
            $this->etat = $materieldetail->etat;
            $this->date_entre = $materieldetail->date_entrer;
        } else {
            return redirect()->to('admin/materiel/recuperer');
        }
    }

    public function updateMateriel()
    {
        dd($this->materiel_id);
        try {
            MaterielRecuperer::where('id',$this->materiel_id)->update([
                'departement_id' => $this->departement,
                'marque' => $this->marque,
                'model' => $this->model,
                'serie' => $this->serie,
                'description' => $this->description,
                'type' => $this->type,
                'etat' => $this->etat,
                'date_entrer' => $this->date_entre,
            ]);
            session()->flash('success', 'Materiel Updated Successfull');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
            Log::error($ex->getMessage());
            $this->dispatchBrowserEvent('close-modal');
        }
    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->departement = '';
        $this->marque = '';
        $this->model = '';
        $this->serie = '';
        $this->type = '';
        $this->description = '';
        $this->etat = '';
        $this->date_entre = '';
    }

    public function render(Request $request)
    {
        $todayDate = Carbon::now()->format('m');
        $materielrecuperer = MaterielRecuperer::when($request->date != null, function ($q) use ($request) {

            return $q->whereMonth('date_entrer', $request->date);
        }, function ($q) use ($todayDate) {

            return $q->whereMonth('date_entrer', $todayDate);
        })->get();
        $departements = Departement::all();
        return view('livewire.materiel', compact('materielrecuperer', 'departements'));
    }
}
