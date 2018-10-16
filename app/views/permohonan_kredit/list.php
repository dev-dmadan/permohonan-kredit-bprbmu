<?php Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>
	    	<?= $this->title['main']; ?>
	    	<small><?= $this->title['sub']; ?></small>
	  	</h1>
	  	<!-- breadcrumb -->
	  	<ol class="breadcrumb">
	    	<li class="active">Data Permohonan Kredit</li>
	  	</ol>
	  	<!-- end breadcrumb -->
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box">
					<!-- box header -->
					<div class="box-header">
						<div class="row">
							<h3 class="box-title"></h3>
						</div>
					</div>
					<!-- box body -->
					<div class="box-body">
						<table id="permohonan_kreditTable" class="table table-bordered table-hover" style="width: 100%">
							<thead>
								<tr>
									<th class="text-right" style="width: 35px">No</th>
									<th>ID FPK</th>
									<th>Tanggal</th>
									<th>No. KTP</th>
									<th>Nama</th>
									<th>Tujuan</th>
									<th class="text-right">Limit Kredit</th>
									<th>Jangka Waktu</th>
									<th>Jenis Agunan</th>
									<th class="text-center">Status Nasabah</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>			
	</section>
	<!-- /.content -->
</div>