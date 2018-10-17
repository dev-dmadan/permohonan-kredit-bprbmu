<?php Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); ?>

<!-- Nama dan Nama panggilan -->
<div class="row">
	<!-- Nama -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-nama has-feedback">
			<label class="control-label col-sm-4" for="nama">Nama (Sesuai KTP): </label>
			<div class="col-sm-8">
				<input type="text" id="nama" class="form-control field" placeholder="Masukkan Nama Lengkap Sesuai KTP">
				<span class="help-block small pesan pesan-nama"></span>
			</div>
		</div>
	</div> 

	<!-- Nama panggilan -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-nama_panggilan has-feedback">
			<label class="control-label col-sm-3" for="nama_panggilan">Nama Panggilan: </label>
			<div class="col-sm-9">
				<input type="text" id="nama_panggilan" class="form-control field" placeholder="Masukkan Nama Panggilan">
				<span class="help-block small pesan pesan-nama_panggilan"></span>
			</div>
		</div>
	</div>
</div>

<!-- Tempat dan Tanggal Lahir -->
<div class="row">
	<!-- Tempat Lahir -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-tmpt_lahir has-feedback">
			<label class="control-label col-sm-4" for="tmpt_lahir">Tempat Lahir: </label>
			<div class="col-sm-8">
				<input type="text" id="tmpt_lahir" class="form-control field" placeholder="Masukkan Tempat Lahir">
				<span class="help-block small pesan pesan-tmpt_lahir"></span>
			</div>
		</div>
	</div>

	<!-- Tanggal Lahir -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-tgl_lahir has-feedback">
			<label class="control-label col-sm-3" for="tgl_lahir">Tanggal Lahir: </label>
			<div class="col-sm-9">
				<input type="text" id="tgl_lahir" class="form-control field datepicker" placeholder="Masukkan Tanggal Lahir">
				<span class="help-block small pesan pesan-tgl_lahir"></span>
			</div>
		</div>
	</div>
</div>

<!-- Jenis Kelamin -->
<div class="form-group field-jk has-feedback">
	<label class="control-label col-sm-2" for="jk">Jenis Kelamin: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="jk" value="Pria">Pria</label>
		<label class="radio-inline"><input type="radio" name="jk" value="Wanita">Wanita</label>
		<span class="help-block small pesan pesan-jk"></span>
	</div>
</div>

<!-- No. Ktp - Berlaku -->
<div class="row">
	<!-- No. KTP -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-no_ktp has-feedback">
			<label class="control-label col-sm-4" for="no_ktp">No. KTP: </label>
			<div class="col-sm-8">
				<input type="text" id="no_ktp" class="form-control field" placeholder="Masukkan No. KTP">
				<span class="help-block small pesan pesan-no_ktp"></span>
			</div>
		</div>
	</div>

	<!-- Berlaku s.d -->
	<div class="col-md-4 col-xs-12">
		<div class="form-group field-berlaku has-feedback">
			<label class="control-label col-sm-4" for="berlaku">Berlaku s.d: </label>
			<div class="col-sm-8">
				<input type="text" id="berlaku" class="form-control field datepicker" placeholder="Berlaku s.d">
				<span class="help-block small pesan pesan-berlaku"></span>
			</div>
		</div>
	</div>
	
	<!-- Seumur hidup -->	
	<div class="col-md-2 col-xs-12">
		<div class="form-group field-seumur_hidup has-feedback">
			<div class="checkbox">
			  	<label><input type="checkbox" id="seumur_hidup" value="1">Seumur Hidup</label>
				<span class="help-block small pesan pesan-seumur_hidup"></span>
			</div>
		</div>
	</div>
</div>

<!-- status perkawinan - jumlah anak -->
<div class="row">
	<!-- Status Perkawinan -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-status_kawin has-feedback">
			<label class="control-label col-sm-4" for="status_kawin">Status Perkawinan: </label>
			<div class="col-sm-8">
				<label class="radio-inline"><input type="radio" name="status_kawin" value="Belum Kawin">Belum Kawin</label>
				<label class="radio-inline"><input type="radio" name="status_kawin" value="Kawin">Kawin</label>
				<label class="radio-inline"><input type="radio" name="status_kawin" value="Duda/Janda">Duda/Janda</label>
				<span class="help-block small pesan pesan-status_kawin"></span>
			</div>
		</div>
	</div>

	<!-- Jumlah Anak -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-jumlah_anak has-feedback">
			<label class="control-label col-sm-3" for="jumlah_anak">Jumlah Anak: </label>
			<div class="col-sm-9">
				<div class="input-group">
					<input type="text" id="jumlah_anak" class="form-control field" placeholder="Masukkan Jumlah Anak" disabled>
					<span class="input-group-addon">Orang</span>
					<span class="help-block small pesan pesan-jumlah_anak"></span>	
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Pendidikan Formal -->
<div class="form-group field-pendidikan_formal has-feedback">
	<label class="control-label col-sm-2" for="pendidikan_formal">Pendidikan Formal: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="pendidikan_formal" value="SD">SD</label>
		<label class="radio-inline"><input type="radio" name="pendidikan_formal" value="SLTP">SLTP</label>
		<label class="radio-inline"><input type="radio" name="pendidikan_formal" value="SLTA">SLTA</label>
		<label class="radio-inline"><input type="radio" name="pendidikan_formal" value="Diploma">Diploma</label>
		<label class="radio-inline"><input type="radio" name="pendidikan_formal" value="S1/S2/S3">S1/S2/S3</label>
		<span class="help-block small pesan pesan-pendidikan_formal"></span>
	</div>
</div>

<!-- Nama Gadis Ibu Kandung -->
<div class="form-group field-nama_ibu has-feedback">
	<label class="control-label col-sm-2" for="nama_ibu">Nama Gadis Ibu Kandung: </label>
	<div class="col-sm-10">
		<input type="text" id="nama_ibu" class="form-control field" placeholder="Masukkan Nama Gadis Ibu Kandung">
		<span class="help-block small pesan pesan-nama_ibu"></span>
	</div>
</div>

<!-- Alamat Tempat Tinggal -->
<div class="form-group field-alamat has-feedback">
	<label class="control-label col-sm-2" for="alamat">Alamat Tempat Tinggal: </label>
	<div class="col-sm-10">
		<textarea id="alamat" class="form-control field" placeholder="Masukkan Alamat Tempat Tinggal"></textarea>
		<span class="help-block small pesan pesan-alamat"></span>
	</div>
</div>

<!-- Status Kepemilikan Rumah - S.d -->
<div class="row">
	<!-- status kepemilikan rumah -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-status_rumah has-feedback">
			<label class="control-label col-sm-4" for="status_rumah">Status Kepemilikan Rumah: </label>
			<div class="col-sm-8">
				<label class="radio-inline"><input type="radio" name="status_rumah" value="Milik Sendiri">Milik Sendiri</label>
				<label class="radio-inline"><input type="radio" name="status_rumah" value="Keluarga">Keluarga</label>
				<label class="radio-inline"><input type="radio" name="status_rumah" value="Dinas">Dinas</label>
				<label class="radio-inline"><input type="radio" name="status_rumah" value="Sewa">Sewa</label>
				<span class="help-block small pesan pesan-status_rumah"></span>
			</div>
		</div>
	</div>

	<!-- Sewa s.d -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-sewa_rumah has-feedback">
			<label class="control-label col-sm-3" for="sewa_rumah">S.d: </label>
			<div class="col-sm-9">
				<input type="text" id="sewa_rumah" class="form-control field datepicker" placeholder="Masukkan Sewa Rumah s.d">
				<span class="help-block small pesan pesan-sewa_rumah"></span>
			</div>
		</div>
	</div>
</div>

<!-- No. Telp -->
<div class="form-group field-no_telp has-feedback">
	<label class="control-label col-sm-2" for="no_telp">No. Telp: </label>
	<div class="col-sm-10">
		<input type="text" id="no_telp" class="form-control field" placeholder="Masukkan No. Telepon">
		<span class="help-block small pesan pesan-no_telp"></span>
	</div>
</div>

<hr>
<label>DATA SUAMI ISTRI</label>
<hr>

<!-- Nama Suami/istri -->
<div class="form-group field-nama_suami_istri has-feedback">
	<label class="control-label col-sm-2" for="nama_suami_istri">Nama (Sesuai KTP): </label>
	<div class="col-sm-10">
		<input type="text" id="nama_suami_istri" class="form-control field" placeholder="Masukkan Nama Suami Atau Istri">
		<span class="help-block small pesan pesan-nama_suami_istri"></span>
	</div>
</div>

<!-- tempat tgl lahir -->
<div class="row">
	<!-- tempat lahir suami/istri -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-tmpt_lahir_suami_istri has-feedback">
			<label class="control-label col-sm-4" for="tmpt_lahir_suami_istri">Tempat Lahir: </label>
			<div class="col-sm-8">
				<input type="text" id="tmpt_lahir_suami_istri" class="form-control field" placeholder="Masukkan Tempat Lahir Suami Atau Istri">
				<span class="help-block small pesan pesan-tmpt_lahir_suami_istri"></span>
			</div>
		</div>
	</div>

	<!-- tanggal lahir suami/istri -->
	<div class="col-md-6 col-xs-12">
		<div class="form-group field-tgl_lahir_suami_istri has-feedback">
			<label class="control-label col-sm-4" for="tgl_lahir_suami_istri">Tanggal Lahir: </label>
			<div class="col-sm-8">
				<input type="text" id="tgl_lahir_suami_istri" class="form-control field datepicker" placeholder="Masukkan Tanggal Lahir Suami atau Istri">
				<span class="help-block small pesan pesan-tgl_lahir_suami_istri"></span>
			</div>
		</div>
	</div>
</div>

<!-- Pekerjaan -->
<div class="form-group field-pekerjaan_suami_istri has-feedback">
	<label class="control-label col-sm-2" for="pekerjaan_suami_istri">Pekerjaan: </label>
	<div class="col-sm-10">
		<input type="text" id="pekerjaan_suami_istri" class="form-control field" placeholder="Masukkan Pekerjaan Suami Atau Istri">
		<span class="help-block small pesan pesan-pekerjaan_suami_istri"></span>
	</div>
</div>