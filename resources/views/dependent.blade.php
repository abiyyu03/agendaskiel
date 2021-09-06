                    <label>Kelas Tingkat</label>
                    <select class="form-control" name="kelas_tingkat_id" id="kelastingkat">
                        <option value="0" disabled="true" selected="true">-</option>
                        @foreach($kelas_tingkat as $kt)
                            <option value="{{$kt->id}}">{{$kt->kelas_tingkat}}</option>
                        @endforeach
                    </select><br>

                    <label>Jurusan</label>
                    <select class="form-control" id="jurusan" >
                        <option value="0" disabled="true" selected="true">-</option>
                        @foreach($data_jurusan as $jurusan)
                            <option value="{{$jurusan->id}}">{{$jurusan->jurusan}}</option>
                        @endforeach
                    </select><br>

                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select id="kelas" class="form-control" name="kelas_id" id="kelas">
                            <option selected>-</option> 
                        </select> 
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select class="form-control" id="nama_mapel"> 
                            <option value="0" disabled="true" selected="true">Pilih kelas tingkat dulu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kompetensi_id">Kompetensi</label>
                        <select id="kompetensi" class="form-control" name="kompetensi_id">
                            <option selected disabled>-</option> 
                        </select> 
                    </div> 
                    <!--Script untuk membuat dependent dropdown-->
@push('addon-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','#kelas_tingkat_id',function(){
            // console.log("hmm its change"); 
            var kelas_tingkat_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findMapel')!!}',
                data:{'id':kelas_tingkat_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>Pilih Mata Pelajaran</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].nama_mapel+'</option>';
                   }

                   div.find('#nama_mapel').html(" ");
                   div.find('#nama_mapel').append(op);
                }, 
            });
        });

    });
</script>
@endpush