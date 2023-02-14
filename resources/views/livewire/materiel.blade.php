<div>
    @include('livewire.modal')
    <section class="content">
        <h2 class="py-3">Materiels Recuperés</h2>
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon fas fa-check"></i> {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="container ml-1">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label>Selectionnez le mois</label>
                        <select wire:model="date" class="form-control">
                            <option value="">Select Mois</option>
                            <option value="01" {{ Request::get('date') == '01' ? 'selected' : '' }}>Janvier</option>
                            <option value="02" {{ Request::get('date') == '02' ? 'selected' : '' }}>Frevier</option>
                            <option value="03" {{ Request::get('date') == '03' ? 'selected' : '' }}>Mars</option>
                            <option value="04" {{ Request::get('date') == '04' ? 'selected' : '' }}>Avril</option>
                            <option value="05" {{ Request::get('date') == '05' ? 'selected' : '' }}>Mai</option>
                            <option value="06" {{ Request::get('date') == '06' ? 'selected' : '' }}>Juin</option>
                            <option value="07" {{ Request::get('date') == '07' ? 'selected' : '' }}>Juillet</option>
                            <option value="08" {{ Request::get('date') == '08' ? 'selected' : '' }}>Aout</option>
                            <option value="09" {{ Request::get('date') == '09' ? 'selected' : '' }}>Septembre
                            </option>
                            <option value="10" {{ Request::get('date') == '10' ? 'selected' : '' }}>Octobre
                            </option>
                            <option value="11" {{ Request::get('date') == '11' ? 'selected' : '' }}>Novembre
                            </option>
                            <option value="12" {{ Request::get('date') == '12' ? 'selected' : '' }}>Decembrre
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-2">
                        <br>
                        <button type="submit" class="btn btn-primary">Rapport</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{-- <a href="{{ url('admin/materiel/recuperer/rapport') }}" target="_blank" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Rapports
                            </a> --}}
                                <span class="ml-5">Listes des Materiels Recuperés de ce Mois
                                    @php
                                        setlocale(LC_ALL, 'FR_FR');
                                        date_default_timezone_set('Europe/Paris');
                                        echo date('F-Y');
                                    @endphp
                                </span>
                            </h3>
                            <div class="card-tools">
                                <button type="button" data-toggle="modal" data-target="#modal-lg1"
                                    class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Departement</th>
                                        <th class="text-center">Marque</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Serie</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Etat de la Machine</th>
                                        <th class="text-center">Date Entrer</th>
                                        <th class="text-center">Details</th>
                                        <th class="text-center">Modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($materielrecuperer as $materiel)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            @if ($materiel->departement_id)
                                                <td class="text-center">{{ $materiel->departement->nom }}</td>
                                            @else
                                                <td class="text-center">Pas de Departement</td>
                                            @endif
                                            <td class="text-center">{{ $materiel->marque }}</td>
                                            <td class="text-center">{{ $materiel->model }}</td>
                                            <td class="text-center">{{ $materiel->serie }}</td>
                                            <td class="text-center">{{ $materiel->type }}</td>
                                            <td class="text-center">
                                                @if ($materiel->etat == 'En Panne')
                                                    <span class="btn btn-danger btn-sm">En Panne</span>
                                                @else
                                                    <span class="btn btn-success btn-sm">En Bon Etat</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $materiel->date_entrer }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('admin/materiel/recuperer/' . $materiel->id . '/detail') }}"
                                                    class="btn btn-info"><i class="fa fa-info"></i></a>
                                            </td>
                                            <td><button type="button" wire:click="editMateriel({{ $materiel->id }})"
                                                    class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Pas d'Agence pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-2">
                                {{-- {{ $subjects->links() }} --}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div
