<h4><p class="ajax-res"></p></h4>
    <div class="card-header">
        <form method="POST" action="{{url('sarana/addsarana')}}" >
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    Nama Perusahaan
                </div>
                <div class="col-sm-5">
                    <input type="text" name="nama" class="form-control" value="{{old('nama')}}" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    Telepon
                </div>
                <div class="col-sm-5">
                    <input type="text" name="telepon" class="form-control" value="{{old('telepon')}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    Penanggungjawab
                </div>
                <div class="col-sm-5">
                    <input type="text" name="penanggungjawab" class="form-control" value="{{old('penanggungjawab')}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    Keterangan
                </div>
                <div class="col-sm-5">
                    <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <button type="submit" id="save" class="btn btn-primary save-data">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("form").on('submit',function(e){
            e.preventDefault();
            var formData=$('form').serializeArray();
            //console.log(formData);
            // AJAX Functionality
            $.ajax({
                url:"{{ route('sarana.storeAddsarana' ) }}",
                type:'post',
                data:formData,
                dataType:'json',
                beforeSend:function(){
                    $(".save-data").addClass('disabled').text('Loading...');
                },
                success:function(res){
                    $(".ajax-res").text('Data perusahaan telah ditambahkan.');
                    $(".save-data").removeClass('disabled').text('Simpan');
                }
            });
        });
    });
</script>