@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    hello wordl
    
    <form action="{{ route('accion.store') }}" method="post">
        @csrf
        @include('accion.form')
    </form>
    
@endsection
    