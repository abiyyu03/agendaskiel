                    <center>
                        <h2>Laporan Agenda per {{Carbon\Carbon::today()->format('l, d F Y')}}</h2> 
                    </center>
                    <table border="1" cellpadding=10 cellspacing=0 id="table_agenda"> 
                        <tr align="center">
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Guru</th>
                            <th>Kelas</th> 
                            <th>Jam</th> 
                            <th>Kelas Tingkat</th>
                            <th>Mata Pelajaran</th>
                            <th>Kompetensi</th>
                            <th>Tugas</th> 
                            <th>Evaluasi</th> 
                            <th>Action</th>
                        </tr>  
                    </thead> 
                    @php
                        $no = 1;
                    @endphp 
                </table>
            </div> 
        </div>
    </div> 
    </div>
    <!-- /.container-fluid -->
@endsection 

@push('addon-script')
<script> 
        $('#table_agenda').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:'{{route('agenda.index')}}',
                type:'GET'
            ,},
            columns: [
            {
                data: 'id',
                name: 'id'
            }, 
            {
                data: 'tanggal',
                name: 'tanggal'
            }, 
            {
                data: 'user_id',
                name: 'user.name'
            },
            {
                data: 'kelas_id',
                name: 'kelas.kelas'
            },
            {
                data: 'jam_id',
                name: 'jam.jamke'
            },
            {
                data: 'kelas_tingkat_id',
                name: 'kelas_tingkat.kelas_tingkat'
            },
            {
                data: 'mapel_id',
                name: 'mapel_id'
            },
            {
                data: 'kompetensi_id',
                name: 'kompetensi_id'
            },
            {
                data: 'tugas',
                name: 'tugas'
            },
            {
                data: 'evaluasi',
                name: 'evaluasi'
            },
        ] 
    });
    </script>
@endpush