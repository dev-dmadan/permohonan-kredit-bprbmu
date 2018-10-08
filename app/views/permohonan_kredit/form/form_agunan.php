<?php Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); ?>

<!-- Jenis -->
<div class="form-group field-jenis has-feedback">
	<label class="control-label col-sm-2" for="jenis">Jenis: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="jenis" value="Mobil">Mobil</label>
		<label class="radio-inline"><input type="radio" name="jenis" value="Motor">Motor</label>
		<label class="radio-inline"><input type="radio" name="jenis" value="Rumah">Rumah</label>
		<label class="radio-inline"><input type="radio" name="jenis" value="Tanah">Tanah</label>
		<label class="radio-inline"><input type="radio" name="jenis" value="Deposito">Deposito</label>
		<label class="radio-inline"><input type="radio" name="jenis" value="Jamsostek">Jamsostek</label>
	</div>
	<span class="help-block small pesan pesan-jenis"></span>
</div>

<!-- Tipe Kendaraan -->
<div class="form-group field-tipe_kendaraan has-feedback">
	<label class="control-label col-sm-2" for="tipe_kendaraan">Tipe Kendaraan: </label>
	<div class="col-sm-10">
		<input type="text" id="tipe_kendaraan" class="form-control field" placeholder="Masukkan Tipe Kendaraan">
	</div>
	<span class="help-block small pesan pesan-tipe_kendaraan"></span>
</div>

<!-- Warna - Tahun -->
<div class="row">
	<!-- Warna -->
	<div class="col-md-8 col-xs-12">
		<div class="form-group field-warna has-feedback">
			<label class="control-label col-sm-3" for="warna">Warna: </label>
			<div class="col-sm-9">
				<input type="text" id="warna" class="form-control field" placeholder="Masukkan Warna Kendaraan">
			</div>
			<span class="help-block small pesan pesan-warna"></span>
		</div>
	</div>

	<!-- Tahun -->
	<div class="col-md-4 col-xs-12">
		<div class="form-group field-tahun has-feedback">
			<label class="control-label col-sm-4" for="tahun">Tahun: </label>
			<div class="col-sm-8">
				<input type="text" id="tahun" class="form-control field" placeholder="Masukkan Tahun Kendaraan">
			</div>
			<span class="help-block small pesan pesan-tahun"></span>
		</div>
	</div>
</div>

<!-- No. BPKB -->
<div class="form-group field-no_bpkb has-feedback">
	<label class="control-label col-sm-2" for="no_bpkb">No. BPKB: </label>
	<div class="col-sm-10">
		<input type="text" id="no_bpkb" class="form-control field" placeholder="Masukkan No. BPKB">
	</div>
	<span class="help-block small pesan pesan-no_bpkb"></span>
</div>

<!-- Atas Nama -->
<div class="form-group field-atas_nama has-feedback">
	<label class="control-label col-sm-2" for="no_fpk">Atas Nama: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="atas_nama" value="Sendiri">Sendiri</label>
		<label class="radio-inline"><input type="radio" name="atas_nama" value="Keluarga">Keluarga</label>
		<label class="radio-inline"><input type="radio" name="atas_nama" value="Orang Lain">Orang Lain</label>
	</div>
	<span class="help-block small pesan pesan-atas_nama"></span>
</div>

<!-- Status -->
<div class="form-group field-status_agunan has-feedback">
	<label class="control-label col-sm-2" for="status_agunan">Status: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="status_agunan" value="SHM">SHM</label>
		<label class="radio-inline"><input type="radio" name="status_agunan" value="SHGB">SHGB</label>
	</div>
	<span class="help-block small pesan pesan-status_agunan"></span>
</div>

<!-- IMB - Ada -->
<div class="row">
	<div class="col-md-4 col-xs-12">
		<div class="form-group field-imb has-feedback">
			<label class="control-label col-sm-6" for="imb">IMB: </label>
			<div class="col-sm-6">
				<label class="radio-inline"><input type="radio" name="imb" value="Ada">Ada</label>
				<label class="radio-inline"><input type="radio" name="imb" value="Tidak Ada">Tidak Ada</label>
			</div>
			<span class="help-block small pesan pesan-imb"></span>
		</div>
	</div>
	<div class="col-md-8 col-xs-12">
		<div class="form-group">
			<!-- <label class="control-label col-sm-2" for="ada">No. BPKB: </label> -->
			<div class="col-sm-12">
				<input type="text" id="ada" class="form-control field" placeholder="">
			</div>
		</div>
	</div>
</div>

<!-- Alamat Jaminan -->
<div class="form-group field-alamat_agunan has-feedback">
	<label class="control-label col-sm-2" for="alamat_agunan">Alamat Jaminan: </label>
	<div class="col-sm-10">
		<textarea id="alamat_agunan" class="form-control field" placeholder="Masukkan Alamat Jaminan Agunan"></textarea>
	</div>
	<span class="help-block small pesan pesan-alamat_agunan"></span>
</div>