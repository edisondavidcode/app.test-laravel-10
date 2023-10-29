@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de etiquetas</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

    <div class="card">

        <div class="card-header">
            <a class="btn btn-success" href="{{ route('admin.tags.create') }}">Agregar Categoria</a>
        </div>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="col-span-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td width = '10px'>
                            <a href="{{ route('admin.tags.edit', $tag) }}"
                                class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width = '10px'>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
