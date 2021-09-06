<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="kelas_tingkat_id" id="kelas_tingkat_id" class="form-control input-lg dynamic" data-dependent="kelas_tingkat_id">
            <option selected>-</option>
        @foreach ($data_kelas_tingkat as $dkt)
            <option value="{{ $dkt->id }}">{{ $dkt->kelas_tingkat }}</option>
        @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="mapel_id" id="mapel_id" class="form-control input-lg dynamic" data-dependent="mapel_id">
        <option selected>-</option>
        @foreach ($mapels as $mapel)
            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
        @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="kompetensi_id" id="kompetensi_id" class="form-control input-lg">
        <option selected disabled>-</option>
            @foreach ($data_kompetensi as $kompetensi)
        <option value="{{ $kompetensi->id }}">{{ $kompetensi->kompetensi }}</option>
            @endforeach
    </select>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
 });
 

});
</script>