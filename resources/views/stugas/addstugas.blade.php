<h4><p class="ajax-res"></p></h4>
    <div class="card-header">
        <form method="POST" action="{{url('stugas/addstugas')}}" >
            @csrf
            <div class="row">
                        <div class="col-sm-2">
                            Surat Tugas *
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="no_st" placeholder="Surat Tugas"
                                class="form-control form-control-sm" value="{{old('no_st')}} " required>
                        </div>
                        <div class="col-sm-auto">
                            Tanggal Surat Tugas *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_st" class="form-control form-control-sm"
                                value="{{old('tgl_st')}} " required>
                        </div>
                       
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-sm-2">
                            Kota/Kabupaten*
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="lokasi" placeholder="Kota / Kabupaten"
                                class="form-control form-control-sm" value="{{old('lokasi')}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Kode Anggaran*</br>
                        </div>
                        <div class="col-sm-10">
                            <br>
                            <select name="budget_id" class="form-control form-control-sm" required>
                                <option value="">- Pilih Anggaran</option>
                                @foreach($budgets as $budget)
                                <option value="{{ $budget->id }}"
                                    {{ old('budget_id') == $budget->id ? 'selected' : null }}>
                                    {{ $budget->sisa }} - {{ $budget->uraian }}</option>
                                @endforeach
                            </select> </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Subdit Pengampu *
                        </div>
                        <div class="col-sm-4">
                            <select name="subdit_id" class="form-control form-control-sm" required>
                                <option value="">- Pilih Subdit</option>
                                @foreach($subdits as $subdit)
                                <option value="{{ $subdit->id }}"
                                    {{ old('subdit_id') == $subdit->id ? 'selected' : null }}>
                                    {{ $subdit->subdit }} </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-auto">
                            Tanggal Pemeriksaan *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_audit" class="form-control form-control-sm"
                                value="{{old('tgl_audit')}}">
                        </div>
                    </div>
                   <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor*
                        </div>
                        <div class="col-sm-4">
                            <select name="user_id[]" class="form-control form-control-sm" required>
                                <option value="">- Pilih Nama Pemeriksa 1</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id[]') == $user->id ? 'selected' : null }}>
                                    {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select name="user_id[]" class="form-control form-control-sm" >
                                <option value="">- Pilih Nama Pemeriksa 2</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id[]') == $user->id ? 'selected' : null }}>
                                    {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor Tambahan
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="tambahan" placeholder="Nama Pemeriksa Tambahan"
                                class="form-control form-control-sm" value="{{old('tambahan')}}">
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-sm-2">                             Biaya 
                        </div>
                        <div class="col-sm-4">
    
                            <input type="number" name="biaya" placeholder="Biaya Audit" class="form-control form-control-sm"
                                value="{{old('biaya')}}">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                url:"{{ route('stugas.storeAddstugas' ) }}",
                type:'post',
                data:formData,
                dataType:'json',
                beforeSend:function(){
                    $(".save-data").addClass('disabled').text('Loading...');
                },
                success:function(res){
                    $(".ajax-res").text('Surat tugas telah ditambahkan.');
                    $(".save-data").removeClass('disabled').text('Simpan');
                }
            });
        });
    });
</script>