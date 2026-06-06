<form action="{{ url('admin/pintu-parkir/proses-tambah') }}" method="post" accept-charset="utf-8">
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
	        	<label class="col-md-3">Nama Pintu Parkir</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nama_pintu_parkir" class="form-control" placeholder="Nama Pintu Parkir" value="{{ old('nama_pintu_parkir') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Keterangan</label>
	        	<div class="col-md-9">
	        		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan')}}</textarea>
	        	</div>
	        </div>
	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Jenis Pintu Parkir</label>
	        	<div class="col-md-9">
	        		<select name="jenis_pintu_parkir" class="form-control">
	        			<option value="Masuk">Masuk</option>
	        			<option value="Keluar" {{ old('jenis_pintu_parkir') == 'Keluar' ? 'selected' : '' }}>Keluar</option>
	        		</select>
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