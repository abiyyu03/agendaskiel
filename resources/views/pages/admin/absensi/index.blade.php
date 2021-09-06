@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid"> 
        <div class="row">
            <div class="card-body">
                <div class="card shadow">
                    <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                <h3>Lihat Absensi</h3>
                <p class="text-secondary">Data diambil dari agenda yang diinput</p>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_absensi" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>Tanggal Agenda</th>
                                <th>Jumlah Siswa</th>
                                <th>Opsi Absensi</th> 
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                    </table>
                </div>
            </div>
            </div>
            </div>
        </div>  
        <div class="d-sm-flex align-items-center justify-content-between mb-">
           
        </div>


        </div>
        <!-- /.container-fluid -->
@endsection
@push('addon-script')
    <script> 
        $('#table_absensi').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url:'{!! route('absensi.index') !!}',
                    type:'GET'
                },
                columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex' 
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }, 
                {
                    data: 'jumlah_siswa',
                    name: 'jumlah_siswa'
                },
                {
                    data: 'opsi_absensi',
                    name: 'opsi_absensi'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
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