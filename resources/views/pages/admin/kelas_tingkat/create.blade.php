@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kelas Tingkat</h1>
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
                <form action="{{route('kelastingkat.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kelas_tingkat">Kelas Tingkat</label>
                        <input type="text" class="form-control" name="kelas_tingkat" placeholder="Kelas Tingkat" value="{{ old('kelas_tingkat') }}">
                    </div> 
                    <div class="form-group">
                        <label for="jurusan_id">Jurusan</label>
                        <select name="jurusan_id[]" multiple class="form-control">
                            <option value="0" selected disabled>-</option>
                            @foreach($data_jurusan as $jurusan)
                                <option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
                            @endforeach
                        </select>
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