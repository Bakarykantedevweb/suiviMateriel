<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapports des Materiels Recuperés</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Rapports des Materiels Recuperés</h2>
                <div class="card">
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
                                </tr>
                            </thead>
                            <tbody>
                                @php $x = 1; @endphp
                                @forelse ($materielrecuperer as $materiel)
                                    <tr>
                                        <td>{{ $x++ }}</td>
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
                                        <td class="text-center">{{ date('d-F-Y', strtotime($materiel->date_entrer)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="8"></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
