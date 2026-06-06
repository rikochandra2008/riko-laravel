<form action="{{ url('admin/jenis-kendaraan/proses-tambah') }}" method="post" accept-charset="utf-8">
	@csrf
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Baru</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Nama Jenis Kendaraan Parkir</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nama_jenis_kendaraan" class="form-control" placeholder="Nama  Jenis Kendaraan Parkir" value="{{ old('nama_jenis_kendaraan') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Keterangan</label>
	        	<div class="col-md-9">
	        		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan')}}</textarea>
	        	</div>
	        </div>
	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Tarif Parkir</label>
	        	<div class="col-md-9">
	        		<input type="text" name="tarif_parkir" class="form-control" placeholder="Tarif Parkir" value="{{ old('tarif_parkir') }}">
	        		
	        	</div>
	        </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>