@extends('layouts.admin')
@section('title', 'Materiel Recuperer')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajout Materiel Recuperé</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Materiel Recuperé</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><a href="{{ url('admin/materiel/recuperer') }}" class="btn btn-primary"><i
                                class="fa fa-list"></i> Retour</a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('admin/materiel/recuperer/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departement</label>
                                    <select class="form-control select2bs4" name="departement" style="width: 100%;">
                                        <option></option>
                                        @forelse ($departements as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @empty
                                            <option>Pas de Departement</option>
                                        @endforelse
                                    </select>
                                    @error('departement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Date Entrer</label>
                                    <input type="date" class="form-control" name="date_entre">
                                    @error('date_entre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type de Materiel</label>
                                    <select class="form-control" id="change" name="type" style="width: 100%;">
                                        <option></option>
                                        <option value="Ordinateur">Ordinateur</option>
                                        <option value="Imprimante">Imprimante</option>
                                        <option value="Scanner">Scanner</option>
                                        <option value="Disk">Disk</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Etat</label>
                                    <select class="form-control" id="change" name="etat" style="width: 100%;">
                                        <option></option>
                                        <option value="Bon">Bon</option>
                                        <option value="En Panne">En Panne</option>
                                    </select>
                                    @error('etat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" id="row">

                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="input">

                                </div>
                            </div>
                            <div class="form-group ml-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Enregistrer</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        var change = $("#change")
        $('#change').on('change', function() {
            $("#input").empty()
            $("#row").empty()
            if (change.val() == "En Panne") {
                input = "<textarea name='description' class='form-control' cols='5' rows='5'></textarea>"
                $("#input").append(input)
            }

             if (change.val() == "Ordinateur") {
                marque ="<input type='text' placeholder='Entrer la maque' name='marque' class='form-control' /></br>"
                model = "<input type='text' placeholder='Entrer le model' name='model' class='form-control' /></br>"
                serie = "<input type='text' placeholder='Entrer la serie' name='serie' class='form-control' /></br>"
                $("#row").append([marque, model, serie])
            }
            if (change.val() == "Imprimante") {
                marque ="<input type='text' placeholder='Entrer la maque' name='marque' class='form-control' /></br>"
                model = "<input type='text' placeholder='Entrer le model' name='model' class='form-control' /></br>"
                serie = "<input type='text' placeholder='Entrer la serie' name='serie' class='form-control' /></br>"
                $("#row").append([marque, model, serie])
            }
            if (change.val() == "Scanner") {
                marque ="<input type='text' placeholder='Entrer la maque' name='marque' class='form-control' /></br>"
                model = "<input type='text' placeholder='Entrer le model' name='model' class='form-control' /></br>"
                serie = "<input type='text' placeholder='Entrer la serie' name='serie' class='form-control' /></br>"
                $("#row").append([marque, model, serie])
            }
            if (change.val() == "Disk") {
                marque ="<input type='text' placeholder='Entrer la maque' name='marque' class='form-control' /></br>"
                serie = "<input type='text' placeholder='Entrer la serie' name='serie' class='form-control' /></br>"
                $("#row").append([marque,serie])
            }
        })
    </script>
@endsection
