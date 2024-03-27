@extends('layouts.app')

@section('title', 'equipo')

@section('content')
    hello wordl
    
    <form action="{{ route('equipo.store') }}" method="post">
        @csrf
        @include('equipo.form')
    </form>
    
@endsection
    