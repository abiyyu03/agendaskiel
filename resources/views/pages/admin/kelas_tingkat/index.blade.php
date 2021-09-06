@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid"> 
        <div class="row">
            <div class="card-body"> 
                <div class="card shadow">
                    <div class="card-body">
                    <div class="table-responsive"> 
                    <div class=" form-group d-none d-sm-inline-block form-inline d-sm-flex align-items-center justify-content-between">
                        <h3>Kelola Kelas Tingkat (Angkatan)</h3> 
                    </div>
                    <table class="table table-bordered" width="100%" cellspacing="0" id="table_kelastingkat">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>Kelas Tingkat</th>  
                                <th>Action</th>
                            </tr>
                        </thead> 
                    </table>
                </div>
            </div>
        </div>
        


        </div>
        <!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script> 
        $('#table_kelastingkat').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url:'{!! route('kelastingkat.index') !!}',
                    type:'GET'
                },
                columns: [
                { 
                    data: 'id', 
                    name: 'id' 
                }, 
                {
                    data: 'kelas_tingkat',
                    name: 'kelas_tingkat'
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