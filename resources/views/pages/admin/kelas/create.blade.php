@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kelas</h1>
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
                <form action="{{route('kelas.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="{{ old('kelas') }}" required="true">
                    </div>
                    <div class="form-agenda">
                        <label for="kelas_tingkat_id">Kelas Tingkat</label>
                        <select name="kelas_tingkat_id" id="kelas_tingkat_id" class="form-control">
                            <option selected value=0>-</option> 
                            @foreach ($data_kelas_tingkat as $dkt)
                                <option value="{{$dkt->id}}">{{$dkt->kelas_tingkat}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="jurusan_id">Jurusan</label> 
                        <select name="jurusan_id" class="form-control" id="">
                            <option selected value=0>-</option>
                            @foreach ($data_jurusan as $jurusan)
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