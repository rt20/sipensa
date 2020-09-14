@if ($errors->any())
<div class="alert alert-outline alert-danger" role="alert">
     <h4 class="alert-heading">Oops!</h4>
     <p>Ada kesalahan. Mohon cek kembali form input. Terima kasih.</p>
     <hr>
     @foreach ($errors->all() as $error)
     <p class="mb-0">{{ $error }}</p>
     @endforeach
</div>
@endif
