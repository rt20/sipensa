<div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
</div>
<div class="card-header">
    <form method="POST" id="addsarana" action="#">
        @csrf
        <div class="row">
            <div class="col-sm-3">
                Nama Perusahaan*
            </div>
            <div class="col-sm-5">
                <input type="text" name="nama" class="form-control" value="{{old('nama')}}" id='nama' required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                Telepon
            </div>
            <div class="col-sm-5">
                <input type="text" name="telepon" class="form-control" id='telepon' value="{{old('telepon')}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                Penanggungjawab
            </div>
            <div class="col-sm-5">
                <input type="text" name="penanggungjawab" class="form-control" id='penanggungjawab'
                    value="{{old('penanggungjawab')}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                Keterangan
            </div>
            <div class="col-sm-5">
                <textarea name="keterangan" class="form-control" id='keterangan'> {{old('keterangan')}}</textarea>
            </div>
        </div>
        <br>

        <div class="modal-footer">
            <button type="submit" id="addsarana" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addsarana").on('submit', function (e) {
            e.preventDefault();
            var formData = $('form').serializeArray();
            //console.log(formData);
            // AJAX Functionality
            $.ajax({
                url: "{{ route('sarana.storeAddsarana' ) }}",
                type: 'post',
                data: formData,
                dataType: 'json',
                beforeSend: function () {
                    $(".save-data").addClass('disabled').text('Loading...');
                },
                success: function (res) {
                    console.log('res', res);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Data sarana telah ditambahkan.");
                    $('#nama').val('');
                    $('#telepon').val('');
                    $('#penanggungjawab').val('');
                    $('#keterangan').val('');
                    // $(".ajax-res").text('Data perusahaan telah ditambahkan.');
                    $(".save-data").removeClass('disabled').text('Simpan');
                }
            });
        });
    });

</script>
