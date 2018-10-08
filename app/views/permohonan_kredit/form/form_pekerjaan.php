<?php Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); ?>

<!-- data pekerjaan - data usaha -->
<div class="form-group field-pilih_pekerjaan has-feedback">
	<label class="control-label col-sm-2" for="pilih_pekerjaan">Data Pekerjaan - Usaha: </label>
	<div class="col-sm-10">
		<label class="radio-inline"><input type="radio" name="pilih_pekerjaan" value="Karyawan">Karyawan</label>
		<label class="radio-inline"><input type="radio" name="pilih_pekerjaan" value="Usaha">Usaha / Wiraswasta</label>
	</div>
	<span class="help-block small pesan pesan-pilih_pekerjaan"></span>
</div>

<!-- Panel Data Pekerjaan -->
<div class="panel-data-pekerjaan" style="display: none">

	<!-- Pekerjaan -->
	<div class="form-group field-pekerjaan has-feedback">
		<label class="control-label col-sm-2" for="pekerjaan">Pekerjaan: </label>
		<div class="col-sm-10">
			<label class="radio-inline"><input type="radio" name="pekerjaan" value="PNS">PNS</label>
			<label class="radio-inline"><input type="radio" name="pekerjaan" value="Pegawai Swasta">Pegawai Swasta</label>
			<label class="radio-inline"><input type="radio" name="pekerjaan" value="Professional">Professional</label>
			<label class="radio-inline"><input type="radio" name="pekerjaan" value="Pensiunan">Pensiunan</label>
			<label class="radio-inline"><input type="radio" name="pekerjaan" value="TNI/POLRI">TNI/POLRI</label>
		</div>
		<span class="help-block small pesan pesan-pekerjaan"></span>
	</div>

	<!-- Bidang Usaha - Lama Bekerja -->
	<div class="row">
		<!-- Bidang Usaha -->
		<div class="col-md-8 col-xs-12">
			<div class="form-group field-bidang_usaha_pekerjaan has-feedback">
				<label class="control-label col-sm-3" for="bidang_usaha_pekerjaan">Bidang Usaha: </label>
				<div class="col-sm-9">
					<input type="text" id="bidang_usaha_pekerjaan" class="form-control field" placeholder="Masukkan Bidang Usaha Pekerjaan">
				</div>
				<span class="help-block small pesan pesan-bidang_usaha_pekerjaan"></span>
			</div>
		</div>

		<!-- Lama Bekerja -->
		<div class="col-md-4 col-xs-12">
			<div class="form-group field-lama_bekerja has-feedback">
				<label class="control-label col-sm-4" for="lama_bekerja">Lama Bekerja: </label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" id="lama_bekerja" class="form-control field" placeholder="Masukkan Lama Bekerja">
						<span class="input-group-addon">Tahun</span>
					</div>
				</div>
				<span class="help-block small pesan pesan-lama_bekerja"></span>
			</div>
		</div>
	</div>

	<!-- Nama Perusahaan - Jabatan -->
	<div class="row">
		<!-- Nama Perusahaan -->
		<div class="col-md-6 col-xs-12">
			<div class="form-group field-nama_perusahaan has-feedback">
				<label class="control-label col-sm-4" for="nama_perusahaan">Nama Perusahaan: </label>
				<div class="col-sm-8">
					<input type="text" id="nama_perusahaan" class="form-control field" placeholder="Masukkan Nama Perusahaan">
				</div>
				<span class="help-block small pesan pesan-nama_perusahaan"></span>
			</div>
		</div>

		<!-- Jabatan -->
		<div class="col-md-6 col-xs-12">
			<div class="form-group field-jabatan has-feedback">
				<label class="control-label col-sm-4" for="jabatan">Jabatan: </label>
				<div class="col-sm-8">
					<input type="text" id="jabatan" class="form-control field" placeholder="Masukkan Jabatan Pekerjaan">
				</div>
				<span class="help-block small pesan pesan-jabatan"></span>
			</div>
		</div>
	</div>

	<!-- Alamat Perusahaan -->
	<div class="form-group field-alamat_perusahaan has-feedback">
		<label class="control-label col-sm-2" for="alamat_perusahaan">Alamat Perusahaan: </label>
		<div class="col-sm-10">
			<textarea id="alamat_perusahaan" class="form-control field" placeholder="Masukkan Alamat Perusahaan Pekerjaan"></textarea>
		</div>
		<span class="help-block small pesan pesan-alamat_perusahaan"></span>
	</div>

	<!-- No. Telp Perusahaan -->
	<div class="form-group field-no_telp_perusahaan has-feedback">
		<label class="control-label col-sm-2" for="no_telp_perusahaan">No. Telp Perusahaan: </label>
		<div class="col-sm-10">
			<input type="text" id="no_telp_perusahaan" class="form-control field" placeholder="Masukkan No. Telepon Perusahaan">
		</div>
		<span class="help-block small pesan pesan-no_telp_perusahaan"></span>
	</div>

	<!-- Penghasilan Bersih -->
	<div class="form-group field-penghasilan_bersih_pekerjaan has-feedback">
		<label class="control-label col-sm-2" for="penghasilan_bersih_pekerjaan">Penghasilan Bersih/Bulan: </label>
		<div class="col-sm-10">
			<input type="text" id="penghasilan_bersih_pekerjaan" class="form-control field" placeholder="<asukkan Penghasilan Bersih Pekerjaan">
		</div>
		<span class="help-block small pesan pesan-penghasilan_bersih_pekerjaan"></span>
	</div>

	<!-- Rata2 Biaya hidup -->
	<div class="form-group field-rata2_biaya_hidup has-feedback">
		<label class="control-label col-sm-2" for="rata2_biaya_hidup">Rata-rata Biaya Hidup/Bulan: </label>
		<div class="col-sm-10">
			<input type="text" id="rata2_biaya_hidup" class="form-control field" placeholder="Masukkan Rata-rata Biaya Hidup/Bulan">
		</div>
		<span class="help-block small pesan pesan-rata2_biaya_hidup"></span>
	</div>
</div>

<!-- Panel Data Usaha -->
<div class="panel-data-usaha" style="display: none">
	<!-- Bentuk Usaha -->
	<div class="form-group field-bentuk_usaha has-feedback">
		<label class="control-label col-sm-2" for="bentuk_usaha">Bentuk Usaha: </label>
		<div class="col-sm-10">
			<label class="radio-inline"><input type="radio" name="bentuk_usaha" value="Perorangan">Perorangan</label>
			<label class="radio-inline"><input type="radio" name="bentuk_usaha" value="Badan Usaha">Badan Usaha</label>
		</div>
		<span class="help-block small pesan pesan-bentuk_usaha"></span>
	</div>

	<!-- Presentase kepemilikan usaha - Usaha Sejak -->
	<div class="row">
		<!-- Presentase kepemilikan usaha -->
		<div class="col-md-6 col-xs-12">
			<div class="form-group field-prosentase_kepemilikan has-feedback">
				<label class="control-label col-sm-4" for="prosentase_kepemilikan">Presentase Kepemilikan: </label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" id="prosentase_kepemilikan" class="form-control field" placeholder="Masukkan Prosentase Kepemilikan">
						<span class="input-group-addon">%</span>	
					</div>
				</div>
				<span class="help-block small pesan pesan-prosentase_kepemilikan"></span>
			</div>
		</div>

		<!-- Usaha Sejak -->
		<div class="col-md-6 col-xs-12">
			<div class="form-group field-usaha_sejak has-feedback">
				<label class="control-label col-sm-4" for="usaha_sejak">Usaha Sejak: </label>
				<div class="col-sm-8">
					<input type="text" id="usaha_sejak" class="form-control field" placeholder="Masukkan Usaha Sejak">
				</div>
				<span class="help-block small pesan pesan-usaha_sejak"></span>
			</div>
		</div>
	</div>

	<!-- Bidang Usaha - Jumlah Karyawan -->
	<div class="row">
		<!-- Bidang Usaha -->
		<div class="col-md-8 col-xs-12">
			<div class="form-group field-bidang_usaha has-feedback">
				<label class="control-label col-sm-3" for="bidang_usaha">Bidang Usaha: </label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" id="bidang_usaha" class="form-control field" placeholder="Masukkan Bidang Usaha">
						<span class="input-group-addon">%</span>	
					</div>
				</div>
				<span class="help-block small pesan pesan-bidang_usaha"></span>
			</div>
		</div>

		<!-- Jumlah Karyawan -->
		<div class="col-md-4 col-xs-12">
			<div class="form-group field-jumlah_karyawan has-feedback">
				<label class="control-label col-sm-4" for="jumlah_karyawan">Jumlah Karyawan: </label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" id="jumlah_karyawan" class="form-control field" placeholder="Masukkan Jumlah Karyawan">
						<span class="input-group-addon">Orang</span>	
					</div>
				</div>
				<span class="help-block small pesan pesan-jumlah_karyawan"></span>
			</div>
		</div>
	</div>

	<!-- Alamat Perusahaan usaha -->
	<div class="form-group field-alamat_usaha has-feedback">
		<label class="control-label col-sm-2" for="alamat_usaha">Alamat Perusahaan/Usaha: </label>
		<div class="col-sm-10">
			<textarea id="alamat_usaha" class="form-control field" placeholder="Masukkan Alamat Usaha"></textarea>
		</div>
		<span class="help-block small pesan pesan-alamat_usaha"></span>
	</div>

	<!-- No. Telp Perusahaan usaha -->
	<div class="form-group field-no_telp_usaha has-feedback">
		<label class="control-label col-sm-2" for="no_telp_usaha">No. Telp Perusahaan/Usaha: </label>
		<div class="col-sm-10">
			<input type="text" id="no_telp_usaha" class="form-control field" placeholder="Masukkan No. Telepon Perusahaan/Usaha">
		</div>
		<span class="help-block small pesan pesan-no_telp_usaha"></span>
	</div>

	<!-- Penghasilan Bersih/bulan usaha -->
	<div class="form-group field-penghasilan_bersih has-feedback">
		<label class="control-label col-sm-2" for="penghasilan_bersih">Penghasilan Bersih/Bulan: </label>
		<div class="col-sm-10">
			<input type="text" id="penghasilan_bersih" class="form-control field" placeholder="Masukkan Penghasilan Bersih/Bulan">
		</div>
		<span class="help-block small pesan pesan-penghasilan_bersih"></span>
	</div>
</div>