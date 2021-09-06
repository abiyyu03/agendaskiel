@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Jam {{ $data_jam->waktu }}</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                    <form action="{{ route('jam.update', $data_jam->id) }}" method="POST">
                        @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="jamke">Jam ke</label>
                                <input type="number" class="form-control" name="jamke" placeholder="Jam ke" value="{{ $data_jam->jamke }}" required="true">
                            </div> 
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="text" class="form-control" name="waktu" placeholder="Waktu" value="{{ $data_jam->waktu }}" required="true">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                Simpan
                            </button>
                    </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->
@endsection