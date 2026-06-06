<form action="{{ url('admin/pintu-parkir/proses-edit') }}" method="post" accept-charset="utf-8">
	@csrf

<input type="hidden" name="id_pintu_parkir" value="{{ $pintuParkir->id_pintu_parkir }}">
	        
<div class="row mb-3">
	<label class="col-md-3">Nama Pintu Parkir</label>
	<div class="col-md-9">
		<input type="text" name="nama_pintu_parkir" class="form-control" placeholder="Nama" value="{{ old('nama_pintu_parkir',$pintuParkir->nama_pintu_parkir) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan', $pintuParkir->keterangan)}}</textarea>
	</div>
</div>


<div class="row mb-3">
	<label class="col-md-3">Jenis Pintu Parkir</label>
	<div class="col-md-9">
		<select name="jenis_pintu_parkir" class="form-control">
			<option value="Masuk">Masuk</option>
			<option value="Keluar" {{ old('jenis_pintu_parkir', $pintuParkir->jenis_pintu_parkir) == 'Keluar' ? 'selected' : '' }}>Keluar</option>
		</select>
	</div>
</div>

 <div class="row mb-3">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<a href="{{ url('admin/pintu-parkir') }}" class="btn btn-secondary">Kembali</a>
		<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
	</div>
</div>
</form>