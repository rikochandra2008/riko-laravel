<form action="{{ url('admin/jenis-kendaraan/proses-edit') }}" method="post" accept-charset="utf-8">
	@csrf

<input type="hidden" name="id_jenis_kendaraan" value="{{ $jenisKendaraan->id_jenis_kendaraan }}">
	        
<div class="row mb-3">
	<label class="col-md-3">Nama Jenis Kendaraan Parkir</label>
	<div class="col-md-9">
		<input type="text" name="nama_jenis_kendaraan" class="form-control" placeholder="Nama Jenis Kendaraan" value="{{ old('nama_tarif_parkir',$jenisKendaraan->nama_jenis_kendaraan) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan', $jenisKendaraan->keterangan)}}</textarea>
	</div>
</div>


<div class="row mb-3">
	<label class="col-md-3">Tarif Parkir</label>
	<div class="col-md-9">
		<input type="text" name="tarif_parkir" class="form-control" placeholder="Tarif Parkir" value="{{ old('tarif_parkir',$jenisKendaraan->tarif_parkir) }}">
	</div>
</div>

 <div class="row mb-3">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<a href="{{ url('admin/jenis-kendaraan') }}" class="btn btn-secondary">Kembali</a>
		<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
	</div>
</div>
</form>