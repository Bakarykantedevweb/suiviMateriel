@extends('layouts.admin')
@section('title', 'Materiel')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajout Materiel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ajout Materiel</li>
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
                <h3 class="card-title"><a href="{{ url('admin/materiel') }}" class="btn btn-primary"><i class="fa fa-list"></i> Retour</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ url('admin/materiel/'.$materiel->id.'/edit') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fournisseur</label>
                                <select class="form-control select2bs4" name="fournisseur" style="width: 100%;">
                                    <option></option>
                                    @forelse ($fournisseur as $item)
                                    <option value="{{$item->id}}" {{ $item->id == $materiel->fournisseur_id ? ' selected="selected"' : '' }}>{{ $item->nom }}</option>
                                    @empty
                                    <option>Pas de Fournisseur</option>
                                    @endforelse
                                </select>
                                @error('fournisseur')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" value="{{ $materiel->model }}" class="form-control" name="model">
                                @error('model')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" value="{{ $materiel->quantite }}" class="form-control" name="stock">
                                @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date Entrer</label>
                                <input type="date" value="{{ $materiel->date_entrer }}" class="form-control" name="date_entre">
                                @error('date_entre')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marque</label>
                                <input type="text" value="{{ $materiel->marque }}" class="form-control" name="marque">
                                @error('marque')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Serie</label>
                                <input type="text" value="{{ $materiel->serie }}" class="form-control" name="serie">
                                @error('serie')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Type de Materiel</label>
                                <select class="form-control select2bs4" name="type" style="width: 100%;">
                                    <option></option>
                                    @if ($materiel->type)
                                    <option value="{{ $materiel->type }}" selected>{{ $materiel->type }}</option>
                                    <option value="Ordinateur">Ordinateur</option>
                                    <option value="Imprimante">Imprimante</option>
                                    <option value="Ondulaire">Ondulaire</option>
                                    <option value="Scanner">Scanner</option>
                                    <option value="Lectrice">Lectrice</option>
                                    @endif
                                </select>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Modifier</button>
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
    })

</script>
@endsection
