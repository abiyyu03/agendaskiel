@section('content')
<center>
    <h2>Laporan Agenda per {{Carbon\Carbon::today()->format('l, d F Y')}}</h2> 
</center>
    {!!$dataTable->table()!!}
    {!!$dataTable->scripts()!!}
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
name: 'user_id'
},
{
data: 'kelas_id',
name: 'kelas_id'
},
{
data: 'jam_id',
name: 'jam_id'
},
{
data: 'kelas_tingkat_id',
name: 'kelas_tingkat_id'
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