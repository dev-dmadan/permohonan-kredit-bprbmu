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
	</section>
	<!-- /.content -->

</div>