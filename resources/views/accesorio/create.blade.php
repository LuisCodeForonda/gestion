@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    hello wordl
    
    <form action="{{ route('accesorio.store') }}" method="post">
        @csrf
        @include('accesorio.form')
    </form>
    
@endsection
    