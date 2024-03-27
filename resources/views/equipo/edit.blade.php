@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    hello wordl
    
    <form action="{{ route('equipo.update', $equipo->id) }}" method="post">
        @csrf
        @method('put')
        @include('equipo.form')
    </form>
    
@endsection
    