@extends('layouts.app')

@section('title')
    AgendaOnline
@endsection

@section('content')
    <!-- Header -->
    {{-- <header style="background-image:url('/frontend/images/smkn1gnp.jpg');background-size:cover" class="text-center"> --}}
        <header class="text-center">
        <h1>SMKN 1 GUNUNG PUTRI</h1>
        <p style="font-size:28px"class="mt-1"><b>Aplikasi Agenda berbasis website</b><br>SMK Bisa, SMK Hebat !!</p>
            @guest
                <a href="{{ url('login') }}" class="btn btn-get-started px-4 mt-4">LOGIN !</a>
            @endguest
            @auth
                <a href="{{ route('form-agenda') }}" class="btn btn-get-started px-3 mt-4"><i class="fas fa-pencil-alt"></i>&nbsp;ISI AGENDA</a>
            @endauth
    </header>  
@endsection