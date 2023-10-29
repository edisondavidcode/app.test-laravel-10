@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success float-right mr-4">Nuevo Post</a>
    <h1>Listado de post</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
