@extends('layouts.admin')
@section('title', 'Agence')
@section('content')
<!-- Main content -->
    <section class="content">
        <h2 class="py-3">Agences</h2>
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
                            <h3 class="card-title">Agences</h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/agence/create') }}" class="btn btn-primary">
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
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @forelse ($agences as $agence)
                                         <tr>
                                             <td class="text-center">{{ $x++ }}</td>
                                             <td class="text-center">{{ $agence->nom }}</td>
                                             <td class="text-center"><a href="{{ url('admin/agence/'.$agence->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                             <td class="text-center"><a href="{{ url('admin/agence/'.$agence->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
