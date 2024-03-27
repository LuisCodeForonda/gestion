@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    hello wordl
    
    <form action="{{ route('accion.update', $accion->id) }}" method="post">
        @csrf
        @method('put')
        @include('accion.form')
    </form>
    
@endsection
    