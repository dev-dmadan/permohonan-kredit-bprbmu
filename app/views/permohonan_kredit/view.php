<?php 
    Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $this->title['main']; ?>
			<small><?= $this->title['sub']; ?></small>
		</h1>
		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li><a href="<?= BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?= BASE_URL."permohonan-kredit-admin/" ?>">Permohonan Kredit</a></li>
			<li class="active">Detail Data Permohonan Kredit</li>
		</ol>
		<!-- end breadcrumb -->
	</section>
	<!-- Main content -->
	<section class="content container-fluid">
		<!-- <?php
            echo '<pre>';
            var_dump($this->data);
            echo '</pre>';
        ?> -->
		<input type="hidden" id="id" value="<?= strtolower($this->data['id']); ?>">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header with-border">
						<!-- export -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="btn-group">
									<!-- export -->
									<button type="button" class="btn btn-success btn-flat" id="exportExcel"><i class="fa fa-file-excel-o"></i> Export Excel</button>
									<!-- hapus -->
									<button type="button" class="btn btn-danger btn-flat" id="hapus"><i class="fa fa-trash"></i> Hapus</button>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body">
						<!-- ID dan Tgl -->
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover">
									<!-- ID -->
									<tr>
										<td><strong>ID</strong></td>
										<td><?= $this->data['id'] ?></td>
									</tr>
									<!-- Tanggal -->
									<tr>
										<td><strong>Tanggal Permohonan Kredit</strong></td>
										<td><?= $this->data['tgl'] ?></td>
									</tr>
								</table>
							</div>
						</div>

						<!-- Data pinjaman -->
						<div class="row">
							<div class="col-md-12">
								<fieldset>
									<legend style="font-size: 18px;">Data Pinjaman</legend>
									<table class="table table-hover">
										<!-- status nasabah -->
										<tr>
											<td><strong>Status Nasabah</strong></td>
											<td><?= $this->data['status_nasabah'] ?></td>
										</tr>

										<!-- limit kredit -->
										<tr>
											<td><strong>Limit Kredit</strong></td>
											<td><?= $this->data['limit_kredit'] ?></td>
										</tr>

										<!-- jangka waktu -->
										<tr>
											<td><strong>Jangka Waktu</strong></td>
											<td><?= $this->data['jangka_waktu'] ?></td>
										</tr>

										<!-- tujuan -->
										<tr>
											<td><strong>Tujuan</strong></td>
											<td><?= $this->data['tujuan'] ?></td>
										</tr>

										<!-- jelaskan -->
										<tr>
											<td><strong>Jelaskan</strong></td>
											<td><?= $this->data['jelaskan'] ?></td>
										</tr>
									</table>
								</fieldset>
							</div>
						</div>
						
						<!-- Data permohonan -->
						<div class="row">
							<div class="col-md-12">
								<fieldset>
									<legend style="font-size: 18px;">Data Permohonan</legend>
									<table class="table table-hover">
										<!-- nama -->
										<tr>
											<td><strong>Nama</strong></td>
											<td><?= $this->data['nama'] ?></td>
										</tr>

										<!-- nama panggilan -->
										<tr>
											<td><strong>Nama Panggilan</strong></td>
											<td><?= $this->data['nama_panggilan'] ?></td>
										</tr>

										<!-- tempat lahir -->
										<tr>
											<td><strong>Tempat Lahir</strong></td>
											<td><?= $this->data['tmpt_lahir'] ?></td>
										</tr>

										<!-- tgl lahir -->
										<tr>
											<td><strong>Tanggal Lahir</strong></td>
											<td><?= $this->data['tgl_lahir'] ?></td>
										</tr>

										<!-- jk -->
										<tr>
											<td><strong>Jenis Kelamin</strong></td>
											<td><?= $this->data['jk'] ?></td>
										</tr>

										<!-- no. ktp -->
										<tr>
											<td><strong>No. KTP</strong></td>
											<td><?= $this->data['no_ktp'] ?></td>
										</tr>

										<!-- berlaku -->
										<tr>
											<td><strong>Berlaku</strong></td>
											<td><?= $this->data['berlaku'] ?></td>
										</tr>

										<!-- seumur hidup -->
										<tr>
											<td><strong>Seumur Hidup</strong></td>
											<td><?= $this->data['seumur_hidup'] ?></td>
										</tr>

										<!-- status kawin -->
										<tr>
											<td><strong>Status Kawin</strong></td>
											<td><?= $this->data['status_kawin'] ?></td>
										</tr>

										<?php
										if($this->data['status_kawin'] != "Belum Kawin"){
											?>
											<!-- jumlah anak -->
											<tr>
												<td><strong>Jumlah Anak</strong></td>
												<td><?= $this->data['jumlah_anak'] ?></td>
											</tr>
											<?php
										}
										?>

										<!-- pendidikan formal -->
										<tr>
											<td><strong>Pendidikan Formal</strong></td>
											<td><?= $this->data['pendidikan_formal'] ?></td>
										</tr>

										<!-- nama ibu -->
										<tr>
											<td><strong>Nama Ibu</strong></td>
											<td><?= $this->data['nama_ibu'] ?></td>
										</tr>

										<!-- alamat -->
										<tr>
											<td><strong>Alamat</strong></td>
											<td><?= $this->data['alamat'] ?></td>
										</tr>

										<!-- status rumah -->
										<tr>
											<td><strong>Status Rumah</strong></td>
											<td><?= $this->data['status_rumah'] ?></td>
										</tr>
										
										<?php
											if($this->data['status_rumah'] == 'Sewa'){
												?>
													<!-- sewa rumah -->
													<tr>
														<td><strong>Sewa Rumah s.d</strong></td>
														<td><?= $this->data['sewa_rumah'] ?></td>
													</tr>
												<?php
											}
										?>

										<!-- no telp -->
										<tr>
											<td><strong>No. Telepon</strong></td>
											<td><?= $this->data['no_telp'] ?></td>
										</tr>

										<?php

											if(!empty($this->data['data_suami_istri'])){
												?>
													<!-- nama suami istri -->
													<tr>
														<td><strong>Nama <?= $this->data['data_suami_istri']['jenis'] ?></strong></td>
														<td><?= $this->data['data_suami_istri']['nama_suami_istri'] ?></td>
													</tr>

													<!-- tmpt lahir suami istri -->
													<tr>
														<td><strong>Tempat Lahir <?= $this->data['data_suami_istri']['jenis'] ?></strong></td>
														<td><?= $this->data['data_suami_istri']['tmpt_lahir_suami_istri'] ?></td>
													</tr>
													
													<!-- tgl lahir suami istri -->
													<tr>
														<td><strong>Tanggal Lahir <?= $this->data['data_suami_istri']['jenis'] ?></strong></td>
														<td><?= $this->data['data_suami_istri']['tgl_lahir_suami_istri'] ?></td>
													</tr>

													<!-- pekerjaan suami istri -->
													<tr>
														<td><strong>Pekerjaan <?= $this->data['data_suami_istri']['jenis'] ?></strong></td>
														<td><?= $this->data['data_suami_istri']['pekerjaan_suami_istri'] ?></td>
													</tr>
												<?php
											}

										?>

										
									</table>
								</fieldset>
							</div>
						</div>

						<!-- Data pekerjaan -->
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover">
								<?php
									// karyawan
									if($this->data['pilih_pekerjaan'] == 'Karyawan'){
										?>
										<fieldset>
											<legend style="font-size: 18px;">Data Pekerjaan</legend>
											<!-- Pekerjaan -->
											<tr>
												<td><strong>Pekerjaan</strong></td>
												<td><?= $this->data['data_pekerjaan']['pekerjaan'] ?></td>
											</tr>
											
											<!-- Bidang Usaha -->
											<tr>
												<td><strong>Bidang Usaha</strong></td>
												<td><?= $this->data['data_pekerjaan']['bidang_usaha_pekerjaan'] ?></td>
											</tr>
											
											<!-- Lama Bekerja -->
											<tr>
												<td><strong>Lama Bekerja</strong></td>
												<td><?= $this->data['data_pekerjaan']['lama_bekerja'] ?></td>
											</tr>

											<!-- Nama perusahaan -->
											<tr>
												<td><strong>Nama Perusahaan</strong></td>
												<td><?= $this->data['data_pekerjaan']['nama_perusahaan'] ?></td>
											</tr>

											<!-- Jabatan -->
											<tr>
												<td><strong>Jabatan</strong></td>
												<td><?= $this->data['data_pekerjaan']['jabatan'] ?></td>
											</tr>

											<!-- Alamat Perusaaan -->
											<tr>
												<td><strong>Alamat Perusahaan</strong></td>
												<td><?= $this->data['data_pekerjaan']['alamat_perusahaan'] ?></td>
											</tr>

											<!-- No. Telp perusahaan -->
											<tr>
												<td><strong>No. Telp Perusahaan</strong></td>
												<td><?= $this->data['data_pekerjaan']['no_telp_perusahaan'] ?></td>
											</tr>

											<!-- penghasilan bersih -->
											<tr>
												<td><strong>Penghasilan Bersih per Bulan</strong></td>
												<td><?= $this->data['data_pekerjaan']['penghasilan_bersih_pekerjaan'] ?></td>
											</tr>

											<!-- rata2 biaya hidup -->
											<tr>
												<td><strong>Rata-rata Biaya Hidup per Bulan</strong></td>
												<td><?= $this->data['data_pekerjaan']['rata2_biaya_hidup'] ?></td>
											</tr>

										</fieldset>
										<?php
									}
									// usaha
									else{
										?>
										<fieldset>
											<legend style="font-size: 18px;">Data Usaha</legend>
											<!-- Bentuk Usaha -->
											<tr>
												<td><strong>Bentuk Usaha</strong></td>
												<td><?= $this->data['data_usaha']['bentuk_usaha'] ?></td>
											</tr>
											
											<!-- Prosentase Kepemilikan -->
											<tr>
												<td><strong>Prosentase Kepemilikan</strong></td>
												<td><?= $this->data['data_usaha']['prosentase_kepemilikan'] ?></td>
											</tr>

											<!-- Usaha Sejak -->
											<tr>
												<td><strong>Usaha Sejak</strong></td>
												<td><?= $this->data['data_usaha']['usaha_sejak'] ?></td>
											</tr>

											<!-- Bidang Usaha -->
											<tr>
												<td><strong>Bidang Usaha</strong></td>
												<td><?= $this->data['data_usaha']['bidang_usaha'] ?></td>
											</tr>

											<!-- Jumlah Karyawan -->
											<tr>
												<td><strong>Jumlah Karyawan</strong></td>
												<td><?= $this->data['data_usaha']['jumlah_karyawan'] ?></td>
											</tr>

											<!-- Alamat usaha -->
											<tr>
												<td><strong>Alamat Usaha</strong></td>
												<td><?= $this->data['data_usaha']['alamat_usaha'] ?></td>
											</tr>

											<!-- No. Telp Usaha -->
											<tr>
												<td><strong>No. Telp Usaha</strong></td>
												<td><?= $this->data['data_usaha']['no_telp_usaha'] ?></td>
											</tr>

											<!-- penghasilan bersih -->
											<tr>
												<td><strong>Penghasilan Bersih per Bulan</strong></td>
												<td><?= $this->data['data_usaha']['penghasilan_bersih'] ?></td>
											</tr>
										</fieldset>
										<?php
									}
								?>
								</table>
							</div>
						</div>

						<!-- Data Agunan -->
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover">
									<fieldset>
										<legend style="font-size: 18px;">Data Agunan</legend>
										<!-- Jenis -->
										<tr>
											<td><strong>Jenis Agunan</strong></td>
											<td><?= $this->data['jenis'] ?></td>
										</tr>
										
										<!-- jika jenis motor / mobil -->
										<?php
											if($this->data['jenis'] == 'Motor' || $this->data['jenis'] == 'Mobil'){
												?>
													<!-- Tipe Kendaraan -->
													<tr>
														<td><strong>Jenis</strong></td>
														<td><?= $this->data['tipe_kendaraan'] ?></td>
													</tr>

													<!-- Warna -->
													<tr>
														<td><strong>Warna</strong></td>
														<td><?= $this->data['warna'] ?></td>
													</tr>

													<!-- Tahun -->
													<tr>
														<td><strong>Tahun</strong></td>
														<td><?= $this->data['tahun'] ?></td>
													</tr>

													<!-- No BPKB -->
													<tr>
														<td><strong>No. BPKB</strong></td>
														<td><?= $this->data['no_bpkb'] ?></td>
													</tr>
												<?php
											}
										?>
										
										<tr>
											<td><strong>Atas Nama</strong></td>
											<td><?= $this->data['atas_nama'] ?></td>
										</tr>

										<!-- jika jenis rumah -->
										<?php
											if($this->data['jenis'] == 'Rumah' || $this->data['jenis'] == 'Tanah'){
												?>
													<tr>
														<td><strong>Status</strong></td>
														<td><?= $this->data['status_agunan'] ?></td>
													</tr>
												<?php
												if($this->data['jenis'] == 'Rumah'){
													?>
														<!-- IMB -->
														<tr>
															<td><strong>IMB</strong></td>
															<td><?= $this->data['ada'] ?></td>
														</tr>
													<?php
												}
											}
										?>

										<tr>
											<td><strong>Alamat Agunan</strong></td>
											<td><?= $this->data['alamat_agunan'] ?></td>
										</tr>
									</fieldset>
								</table>
							</div>
						</div>

						<!-- Data Keluara -->
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover">
									<fieldset>
										<legend style="font-size: 18px;">Data Keluarga</legend>
										<!-- nama keluarga -->
										<tr>
											<td><strong>Nama Keluarga</strong></td>
											<td><?= $this->data['nama_keluarga'] ?></td>
										</tr>

										<!-- alamat keluarga -->
										<tr>
											<td><strong>Alamat Keluarga</strong></td>
											<td><?= $this->data['alamat_keluarga'] ?></td>
										</tr>

										<!-- no. telp keluarga -->
										<tr>
											<td><strong>No. Telp Keluarga</strong></td>
											<td><?= $this->data['no_telp_keluarga'] ?></td>
										</tr>

										<!-- hubungan keluarga -->
										<tr>
											<td><strong>Hubungan Keluarga</strong></td>
											<td><?= $this->data['hubungan_keluarga'] ?></td>
										</tr>
									</fieldset>
								</table>
							</div>
						</div>

						<!-- Data Upload -->
						<div class="row">
							<div class="col-md-12">
								<table class=="table table-hover">
									<!-- File KTP Pemohon -->
									<tr>
										<td><strong>File KTP Pemohon</strong></td>
										<td><?= $this->data['file_ktp_pemohon']; ?></td>
									</tr>

									<!-- File KTP Suami Istri -->
									<tr>
										<td><strong>File KTP Suami Istri</strong></td>
										<td><?= $this->data['file_ktp_suami_istri'] ?></td>
									</tr>

									<!-- File KK -->
									<tr>
										<td><strong>File KK</strong></td>
										<td><?= $this->data['file_kk'] ?></td>
									</tr>

									<!-- File Slip Gaji -->
									<tr>
										<td><strong>File Slip Gaji</strong></td>
										<td><?= $this->data['file_slip_gaji'] ?></td>
									</tr>

									<!-- File STNK -->
									<tr>
										<td><strong>File STNK</strong></td>
										<td><?= $this->data['file_stnk'] ?></td>
									</tr>

									<!-- File Nota pajak -->
									<tr>
										<td><strong>File Nota Pajak</strong></td>
										<td><?= $this->data['file_nota_pajak'] ?></td>
									</tr>

									<!-- File Bpkb -->
									<tr>
										<td><strong>File BPKB</strong></td>
										<td><?= $this->data['file_bpkb'] ?></td>
									</tr>

									<!-- File faktur -->
									<tr>
										<td><strong>File Faktur</strong></td>
										<td><?= $this->data['file_faktur'] ?></td>
									</tr>

									<!-- File kwintasi jual beli -->
									<tr>
										<td><strong>File Kwintasi Jual Beli</strong></td>
										<td><?= $this->data['file_kwintasi_jual_beli'] ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>



	</section>
	<!-- /.content -->

</div>