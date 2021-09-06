@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->


        <div class="row">
            <div class="card-body"> 
                <div class="card shadow">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif 
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kompetensi Dasar</h1>
                            <a href={{ route('kompetensi.create') }} class="btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm textwhite-50"></i> Kompetensi Dasar
                        </a> 
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="table_kompetensi">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th width="10%">Nomor KD</th>
                                <th width="50%">Redaksi Kompetensi Dasar</th>
                                <th width="20%">Mapel</th> 
                                <th >Kelas Tingkat</th> 
                                <th >Jurusan</th> 
                                <th width="16%">Action</th>
                            </tr>
                        </thead>
                    </table> 
                </div>
                </div>     
                </div>
            </div>
        </div>
        </div> 
        <div class="card-body"> 
            <div class="card shadow">
                <div class="card-header" style="padding-bottom:0"><p>Import File Excel</p> </div>
                    <div class="card-body">  
                        <form action="{{ route('kompetensi.import') }}" method="get" accept-charset="utf-8"> 
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <input type="file" class="form-control" name="import_kompetensi" required>
                                <i class="fas fa-plus fa-sm text-white-50"></i> <button class="btn btn-sm btn-primary shadow-sm">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        <!-- /.container-fluid -->
@endsection
@push('addon-script')
    <script> 
        $('#table_kompetensi').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url:'{!! route('kompetensi.index') !!}',
                    type:'GET'
                },
                columns: [
                { 
                    data: 'id', 
                    name: 'id' 
                }, 
                {
                    data: 'nomor',
                    name: 'nomor'
                },
                {
                    data: 'kompetensi',
                    name: 'kompetensi'
                },
                {
                    data: 'mapel',
                    name: 'mapel.nama_mapel'
                },
                {
                    data: 'kelas_tingkat',
                    name: 'mapel.kelas_tingkat.kelas_tingkat'
                },
                {
                    data: 'jurusan',
                    name: 'mapel.jurusan.jurusan'
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                }
            ] 
        });
    </script>
@endpush