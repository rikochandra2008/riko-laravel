<p>Terdapat <strong class="text-danger"><em><?php echo count($parkir) ?></em></strong> data parkir website ini.</p>
<form action="{{ url('admin/parkir') }}" method="get" accept-charset="utf-8">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="keywords" placeholder="Cari pengguna..." aria-label="Nama/Email" aria-describedby="button-addon1" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" required>
	  <button class="btn btn-info text-white" type="submit" id="button-addon1">
	  	<i class="bi bi-search"></i> Cari
	  </button>
	  <?php if(isset($_GET['keywords'])) { ?>
	  	<a href="{{ url('admin/parkir') }}" class="btn btn-secondary">
	  		<i class="bi bi-arrow-left"></i> Kembali
	  	</a>
	  <?php } ?>
	  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		 <i class="bi bi-plus-circle-fill"></i> Tambah Data
		</button>
	</div>
</form>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Kendaraan</th>
			<th>No Parkir</th>
			<th>Masuk</th>
			<th>Keluar</th>
			<th>Tarif</th>
			<th>Durasi</th>
			<th>Total</th>	
			<th>Status</th>			
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php  $no = 1;foreach($parkir as $row) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $row->nomor_polisi ?></td>
				<td><?php echo $row->nomor_parkir ?></td>
				<td><?php echo $row->tanggal_masuk ?></td>
				<td><?php echo $row->tanggal_keluar ?></td>
				<td><?php echo $row->harga ?></td>
				<td><?php echo $row->total_durasi ?></td>
				<td><?php echo $row->total_harga ?></td>
				<td><?php echo $row->status_bayar ?></td>

				<td>
					<?php if($row->status_bayar=='Sudah') { ?>

						<button type="button" class="btn btn-primary btn-sm disabled" data-bs-toggle="modal">
		 				<i class="bi bi-box-arrow-right"></i> Keluar Parkiran
					</button>

						<?php }else{ ?>

					<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-{{ $row->id_parkir }}">
		 				<i class="bi bi-box-arrow-right"></i> Keluar Parkiran
					</button>

				<?php } ?>

					<a href="{{ url('admin/parkir/delete/'.$row->id_parkir) }}" class="btn btn-sm btn-secondary delete-link">
						<i class="bi bi-trash-fill"></i>
					</a>

					@include('admin/parkir/edit')
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>

@include('admin/parkir/tambah')
