@extends('layouts.admin')
@section('title', 'Materiel Recuperer')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h2 class="py-3 text-center">Detail du Materiel Recuperé</h2>
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
                            <h3 class="card-title">
                                <a href="{{ url('admin/materiel/recuperer') }}" class="btn btn-primary">
                                    <i class="fas fa-list"></i> retour
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tr>
                                    <th>Departement</th>
                                    <th>Marque</th>
                                    <th>Model</th>
                                    <th>Serie</th>
                                    <th>Type</th>
                                    <th>Etat</th>
                                    <th>Date Entre</th>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    <td>{{ $materieldetail->departement->nom }}</td>
                                    <td>{{ $materieldetail->marque }}</td>
                                    <td>{{ $materieldetail->model }}</td>
                                    <td>{{ $materieldetail->serie }}</td>
                                    <td>{{ $materieldetail->type }}</td>
                                    <td>{{ $materieldetail->etat }}</td>
                                    <td>{{ date('d-F-Y',strtotime($materieldetail->date_entrer)) }}</td>
                                    <td>{{ $materieldetail->description }}</td>
                                </tr>
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
@endsection
