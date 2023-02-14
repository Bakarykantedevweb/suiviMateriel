@extends('layouts.admin')
@section('title', 'Materiel Recuperer')
@section('content')
    <!-- Main content -->
    <livewire:materiel>
    <!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-lg').modal('hide');
        })
    </script>
@endsection
