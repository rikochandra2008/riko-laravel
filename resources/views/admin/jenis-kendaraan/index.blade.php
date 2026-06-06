<p>Terdapat <strong class="text-danger"><em><?php echo count($jenisKendaraan) ?></em></strong> data jenis kendaraandi website ini.</p>
<form action="{{ url('admin/jenis-kendaraan') }}" method="get" accept-charset="utf-8">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="keywords" placeholder="Cari pengguna..." aria-label="Nama/Email" aria-describedby="button-addon1" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" required>
	  <button class="btn btn-info text-white" type="submit" id="button-addon1">
	  	<i class="bi bi-search"></i> Cari
	  </button>
	  <?php if(isset($_GET['keywords'])) { ?>
	  	<a href="{{ url('admin/jenis-kendaraan') }}" class="btn btn-secondary">
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
			<th>Nama Jenis Kendaraan</th>
			<th>Keterangan</th>
			<th>Tarif Parkir</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php  $no = 1;foreach($jenisKendaraan as $row) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $row->nama_jenis_kendaraan ?></td>
				<td><?php echo $row->keterangan ?></td>
				<td><?php echo $row->tarif_parkir ?></td>
				<td>
					<a href="{{ url('admin/jenis-kendaraan/edit/'.$row->id_jenis_kendaraan) }}" class="btn btn-sm btn-info">
						<i class="bi bi-pencil-square"></i>
					</a>
					<a href="{{ url('admin/jenis-kendaraan/delete/'.$row->id_jenis_kendaraan) }}" class="btn btn-sm btn-secondary delete-link">
						<i class="bi bi-trash-fill"></i>
					</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>

@include('admin/jenis-kendaraan/tambah')
