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
                <div class="form-group d-none d-sm-inline-block form-inline d-sm-flex align-items-center justify-content-between">
                    <h3>Kelola Jam Pelajaran</h3>
                    <a href={{ route('jam.create') }} class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jam Pelajaran
                    </a>  
                </div>  
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_jam" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th width="10%" class="th.fit">#</th>
                                <th>Jam Ke</th>
                                <th>Waktu</th> 
                                <th width="15%">Action</th>
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
                        <form action="{{ route('jam.import') }}" method="get" accept-charset="utf-8"> 
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <input type="file" class="form-control" name="import_jam" required>
                                <i class="fas fa-plus fa-sm text-white-50"></i> <button class="btn btn-sm btn-primary shadow-sm">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <!-- /.container-fluid -->
@endsection
@push('addon-script')
    <script> 
        $('#table_jam').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url:'{!! route('jam.index') !!}',
                    type:'GET'
                }, 
                columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex' 
                },
                {
                    data: 'jamke',
                    name: 'jamke'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
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