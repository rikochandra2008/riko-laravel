<form action="{{ url('admin/parkir/proses-tambah') }}" method="post" accept-charset="utf-8">
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
	        	<label class="col-md-3">Jenis Kendaraan</label>
	        	<div class="col-md-9">
	        		<select name="id_jenis_kendaraan" class="form-control">
	        			<?php foreach($JenisKendaraan as $row) { ?>
	        				<option value="{{ $row->id_jenis_kendaraan}}">
	        					{{ $row->nama_jenis_kendaraan }}
	        				</option>
	        			<?php } ?>
	        		</select>
	        	</div>
	        </div>
	        		

	        <div class="row mb-3">
	        	<label class="col-md-3">Pintu Masuk</label>
	        	<div class="col-md-9">
	        		<select name="id_pintu_masuk" class="form-control">
	        			<?php foreach($PintuMasuk as $row) { ?>
	        				<option value="{{ $row->id_pintu_parkir}}">
	        					{{ $row->nama_pintu_parkir }}
	        				</option>
	        			<?php } ?>
	        		</select>
	        	</div>
	        </div>

	        	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Nomor Polisi</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nomor_polisi" class="form-control" placeholder="Nomor Polisi" value="{{ old('nomor_polisi') }}">
	        		
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