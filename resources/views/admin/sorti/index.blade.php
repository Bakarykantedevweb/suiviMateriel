@extends('layouts.admin')
@section('title', 'Materiel')
@section('content')
<style type=text/css>
    .buttons-excel {
        background-color: green;
        padding: 10px 10px 10px 10px;
        border-radius: 4px;
        color: white;
        border: none;
        margin-left: 18px;
    }
</style>
    <!-- Main content -->
    <section class="content">
        <h2 class="py-3">Materiels Sortie</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="icon fas fa-check"></i> {{ $message }}
            </div>
        @endif
        <div class="container ml-1">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label>Selectionnez le mois</label>
                        <select name="date" class="form-control">
                            <option value="">Select Mois</option>
                            <option value="01" {{ Request::get('date') == '01' ? 'selected' : '' }}>Janvier</option>
                            <option value="02" {{ Request::get('date') == '02' ? 'selected' : '' }}>Frevier</option>
                            <option value="03" {{ Request::get('date') == '03' ? 'selected' : '' }}>Mars</option>
                            <option value="04" {{ Request::get('date') == '04' ? 'selected' : '' }}>Avril</option>
                            <option value="05" {{ Request::get('date') == '05' ? 'selected' : '' }}>Mai</option>
                            <option value="06" {{ Request::get('date') == '06' ? 'selected' : '' }}>Juin</option>
                            <option value="07" {{ Request::get('date') == '07' ? 'selected' : '' }}>Juillet</option>
                            <option value="08" {{ Request::get('date') == '08' ? 'selected' : '' }}>Aout</option>
                            <option value="09" {{ Request::get('date') == '09' ? 'selected' : '' }}>Septembre</option>
                            <option value="10" {{ Request::get('date') == '10' ? 'selected' : '' }}>Octobre</option>
                            <option value="11" {{ Request::get('date') == '11' ? 'selected' : '' }}>Novembre</option>
                            <option value="12" {{ Request::get('date') == '12' ? 'selected' : '' }}>Decembrre</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-3">
                        <label>Date</label>
                        <input type="month" class="form-control" name="date">
                    </div> --}}
                    <div class="col-md-6 mt-2">
                        <br>
                        <button type="submit" class="btn btn-primary">Rapport</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <?php ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ url('admin/sortimateriel/create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Ajouter
                                </a>
                                <span class="text-center ml-5">Listes des Materiels Sortis de ce Mois
                                    @php
                                        setlocale(LC_ALL, 'FR_FR');
                                        date_default_timezone_set('Europe/Paris');
                                        echo date('F-Y');
                                    @endphp
                                </span>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Prenom</th>
                                        <th class="text-center">Agence</th>
                                        <th class="text-center">Materiels</th>
                                        <th class="text-center">Date Sortie</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($materielsorti as $materiel)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td class="text-center">{{ $materiel->nom }}</td>
                                            <td class="text-center">{{ $materiel->prenom }}</td>
                                            <td class="text-center">{{ $materiel->agence->nom }}</td>
                                            <td class="text-center">
                                                @php
                                                    $hobbies = json_decode($materiel->materiel_id);
                                                @endphp
                                                @foreach ($hobbies as $hobby)
                                                    <span class="btn-sm btn btn-primary">{{ $hobby }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ date('d-F-Y', strtotime($materiel->date_sorti)) }}
                                            </td>
                                            <td class="text-center"><a href="" class="btn btn-primary"><i
                                                        class="fa fa-edit"></i></a></td>
                                            <td class="text-center"><a href="" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Pas de Materiel pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel"],
                "bPaginate": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
