@extends('layouts.admin')
@section('title', 'Materiel')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sorti Materiel</h1>
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
                <h3 class="card-title"><a href="{{ url('admin/sortimateriel') }}" class="btn btn-primary"><i class="fa fa-list"></i> Retour</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ url('admin/sortimateriel/create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agences</label>
                                <select class="form-control select2bs4" name="agence" style="width: 100%;">
                                    <option></option>
                                    @forelse ($agences as $item)
                                    <option value="{{$item->id}}">{{ $item->nom }}</option>
                                    @empty
                                    <option>Pas d'Agence</option>
                                    @endforelse
                                </select>
                                @error('agence')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom">
                                @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date Sortie</label>
                                <input type="date" class="form-control" name="date_sortie">
                                @error('date_sortie')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom">
                                @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Maeteriel</label>
                                <select class="form-control select2" name="materiel[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    @forelse ($materiels as $materiel)
                                        <option value="{{ $materiel->marque.'-'.$materiel->model }}">{{ $materiel->marque.'-'.$materiel->model }} ({{ $materiel->type }})</option>
                                    @empty
                                        <option selected>Pas de Materiels</option>
                                    @endforelse
                                </select>
                                 @error('materiel')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                        </div>
                        <div class="form-group ml-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregistrer</button>
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

