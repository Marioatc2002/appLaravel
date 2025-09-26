@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<h2>Usuarios Registrados</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Creación</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay usuarios registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
