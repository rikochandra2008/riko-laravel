<form action="{{ url('admin/parkir/proses-edit') }}" method="post" accept-charset="utf-8">
	@csrf

	<input type="hidden" name="id_parkir" value="{{ $row->id_parkir }}">

	<!-- Modal -->
	<div class="modal fade" id="edit-{{ $row->id_parkir }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keluar Parkiran</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">	                		

	        <div class="row mb-3">
	        	<label class="col-md-3">Pintu Keluar</label>
	        	<div class="col-md-9">
	        		<select name="id_pintu_keluar" class="form-control">
	        			<?php foreach($PintuKeluar as $rowKeluar) { ?>
	        				<option value="{{ $rowKeluar->id_pintu_parkir}}">
	        					{{ $rowKeluar->nama_pintu_parkir }}
	        				</option>
	        			<?php } ?>
	        		</select>
	        	</div>
	        </div>

	        	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Nomor Polisi</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nomor_polisi" class="form-control bg-warning" disabled placeholder="Nomor Polisi" value="{{ $row->nomor_polisi }}">	        		
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