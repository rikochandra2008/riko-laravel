<div class="row">
	<!-- profil -->
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-light">
				<strong>PROFIL SAYA</strong>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<th>Nama</th>
						<th>{{ $user->nama }}</th>
					</thead>
					<tbody>
						<tr>
							<td>Username</td>
							<td>{{ $user->username }}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<td>Role/Level</td>
							<td>{{ $user->akses_level }}</td>
						</tr>
						<tr>
							<td>Created at</td>
							<td>{{ $user->created_at }}</td>
						</tr>
						<tr>
							<td>Updated at</td>
							<td>{{ $user->updated_at }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- end profil -->
	<!-- form update -->
	<div class="col-md-8">
		<div class="card">
			<div class="card-header bg-light">
				<strong>FORM UPDATE PROFIL</strong>
			</div>
			<div class="card-body">
				<!-- FORM MASUK SINI GAIS -->
				<form action="{{ url('admin/akun/proses-edit') }}" method="post" accept-charset="utf-8">
					@csrf

					<input type="hidden" name="id_user" value="{{ $user->id_user }}">

					<div class="row mb-3">
						<label class="col-md-3">Nama</label>
						<div class="col-md-9">
							<input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama',$user->nama) }}">
						</div>
					</div>

					<div class="row mb-3">
						<label class="col-md-3">Email</label>
						<div class="col-md-9">
							<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email',$user->email) }}">
						</div>
					</div>

					<div class="row mb-3">
						<label class="col-md-3">Username</label>
						<div class="col-md-9">
							<input type="text" name="username" class="form-control disabled bg-warning" readonly placeholder="Username" value="{{ old('username',$user->username) }}">
						</div>
					</div>

					<div class="row mb-3">
						<label class="col-md-3">Password</label>
						<div class="col-md-9">
							<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
							<small class="text-danger">Ketik minimal 6 dan maksimal 32 karakter atau biarkan kosong jika tidak ingin mengganti password.</small>
						</div>
					</div>

					<div class="row mb-3">
						<label class="col-md-3">Level</label>
						<div class="col-md-9">
							<select name="akses_level" class="form-control disabled bg-warning">
								<option value="{{ session('akses_level') }}">
									{{ session('akses_level') }}
								</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label class="col-md-3"></label>
						<div class="col-md-9">
							
							<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
						</div>
					</div>
				</form>
				<!-- END FORM -->
			</div>
		</div>
	</div>
	<!-- end form update -->
</div>