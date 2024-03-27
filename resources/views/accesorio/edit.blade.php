@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    hello wordl
    
    <form action="{{ route('accesorio.update', $accesorio->id) }}" method="post">
        @csrf
        @method('put')
        @include('accesorio.form')
    </form>
    
@endsection
    