<?php 
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); 
?>

<!-- Status Nasabah -->
<div class="form-group field-status_nasabah has-feedback">
	<label class="control-label col-sm-2" for="no_fpk">Status Nasabah: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="status_nasabah" value="Baru">Baru</label>
		<label class="radio-inline"><input type="radio" name="status_nasabah" value="Lama">Lama</label>
		<span class="help-block small pesan pesan-status_nasabah"></span>
	</div>
</div>

<!-- Limit Kredit dan Jangka Waktu -->
<div class="row">
	<!-- Limit Kredit -->
	<div class="col-md-8 col-xs-12">
		<div class="form-group field-limit_kredit has-feedback">
			<label class="control-label col-sm-3" for="limit_kredit">Limit Kredit: </label>
			<div class="col-sm-9">
				<input type="text" id="limit_kredit" class="form-control field" placeholder="Masukkan Limit Kredit">
				<span class="help-block small pesan pesan-limit_kredit"></span>
			</div>
		</div>
	</div>

	<!-- Jangka Waktu -->
	<div class="col-md-4 col-xs-12">
		<div class="form-group field-jangka_waktu has-feedback">
			<label class="control-label col-sm-4" for="jangka_waktu">Jangka Waktu: </label>
			<div class="col-sm-8">
				<input type="text" id="jangka_waktu" class="form-control field" placeholder="Masukkan Jangka Waktu">
				<span class="help-block small pesan pesan-jangka_waktu"></span>
			</div>
		</div>
	</div>
</div>	

<!-- Tujuan Kredit -->
<div class="form-group field-tujuan has-feedback">
	<label class="control-label col-sm-2" for="tujuan">Tujuan Permohonan Kredit: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="tujuan" value="Modal Kerja">Modal Kerja</label>
		<label class="radio-inline"><input type="radio" name="tujuan" value="Investasi">Investasi</label>
		<label class="radio-inline"><input type="radio" name="tujuan" value="Konsumtif">Konsumtif</label>
		<span class="help-block small pesan pesan-tujuan"></span>
	</div>
</div>

<!-- Jelaskan -->
<div class="form-group field-jelaskan has-feedback">
	<label class="control-label col-sm-2" for="jelaskan">Jelaskan: </label>
	<div class="col-sm-10">
		<textarea id="jelaskan" class="form-control field" placeholder="Jelaskan Permohonan Kredit"></textarea>
		<span class="help-block small pesan pesan-jelaskan"></span>
	</div>
</div>