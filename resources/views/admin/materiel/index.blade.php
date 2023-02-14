@extends('layouts.admin')
@section('title', 'Materiel')
@section('content')
<!-- Main content -->
<section class="content">
    <h2 class="py-3">Materiels</h2>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="icon fas fa-check"></i> {{ $message }}
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materiels</h3>
                        <div class="card-tools">
                            <a href="{{ url('admin/materiel/create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fournisseur</th>
                                    <th class="text-center">Marque</th>
                                    <th class="text-center">Model</th>
                                    <th class="text-center">Serie</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Quantite</th>
                                    <th class="text-center">Date Entrer</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $x = 1; @endphp
                                @forelse ($materiels as $materiel)
                                <tr>
                                    <td class="text-center">{{ $x++ }}</td>
                                    @if ($materiel->fournisseur_id)
                                        <td class="text-center">{{ $materiel->fournisseur->nom }}</td>
                                    @else
                                        <td class="text-center">Pas de Fournisseur</td>
                                    @endif
                                    <td class="text-center">{{ $materiel->marque }}</td>
                                    <td class="text-center">{{ $materiel->model }}</td>
                                    <td class="text-center">{{ $materiel->serie }}</td>
                                    <td class="text-center">{{ $materiel->type }}</td>
                                    <td class="text-center">{{ $materiel->quantite }}</td>
                                    <td class="text-center">{{ $materiel->date_entrer }}</td>
                                    <td class="text-center"><a href="{{ url('admin/materiel/' . $materiel->id . '/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                    <td class="text-center"><a href="{{ url('admin/materiel/' . $materiel->id . '/delete') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Pas d'Agence pour le moment</td>
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

<!-- /.content -->
@endsection
