<?php 
    Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BPR BMU - Form Permohonan Kredit</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- favicon -->
		<link rel="shortcut icon" href="<?= SITE_URL."assets/images/favicon.png" ?>" type="image/x-icon">
		<link rel="icon" type="image/png" href="<?= SITE_URL."assets/images/favicon.png" ?>">

		<!-- Google fonts --->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css' >

		<!-- font awesome --->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type='text/css'>

		<!-- bootstrap --->
		<link rel="stylesheet" href="<?= SITE_URL."assets/bootstrap/css/bootstrap.min.css" ?>" type='text/css' />

		<!-- animate.css --->
		<link rel="stylesheet" href="<?= SITE_URL."assets/animate/animate.min.css" ?>" />
		<link rel="stylesheet" href="<?= SITE_URL."assets/animate/set.min.css" ?>" />

		<!-- slider -->
		<link href="<?= SITE_URL."assets/slider/slider.css" ?>" rel="stylesheet" type="text/css" />

		<!-- portfolio -->
		<link rel="stylesheet" href="<?= SITE_URL."assets/portfolio/css/portfolio.css" ?>" />
		<link rel="stylesheet" href="<?= SITE_URL."assets/portfolio/css/fancy-buttons.css" ?>" />
		<link rel="stylesheet" id="scheme-source" href="<?= SITE_URL."assets/portfolio/css/color/blue.css" ?>" />

		<!-- Owl Carosel css -->
		<link rel="stylesheet" href="<?= SITE_URL."assets/owl/css/owl.carousel.css" ?>">
		<link rel="stylesheet" href="<?= SITE_URL."assets/owl/css/owl.theme.default.css" ?>">
		<link rel="stylesheet" href="<?= SITE_URL."assets/owl/css/owl.theme.css" ?>">

		<!-- general style -->
		<link rel="stylesheet" href="<?= SITE_URL."assets/style.css" ?>">

		<!-- hover card image -->
		<link href="<?= SITE_URL."assets/flip-hover-image/style.css" ?>" rel="stylesheet" type="text/css">
	
		<!-- sweet alert 2 -->
		<link rel="stylesheet" href="<?= BASE_URL."assets/bower_components/sweetalert/sweetalert.css"; ?>">
		<!-- toastr -->
		<link rel="stylesheet" href="<?= BASE_URL."assets/bower_components/toastr/build/toastr.min.css"; ?>">
	</head>
	<body>

		<div class="topbar animated fadeInLeftBig"></div>
		<div id="topContactBar" class="topContactBar nav-down">
    		<div class="contact-facebook">
    			<a href="https://www.facebook.com/bpr.bmu" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
    		</div>
    		<div class="contact-instagram">
    			<a href="https://www.instagram.com/bprbmu.co.id/" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
    		</div>
    		<div class="contact-map">
    			<a href="#"><i class="fa fa-map-marker"></i> Kantor Pusat: Jl. Setiabudhi No.170 A Bandung</a>
    		</div>
    		<div class="contact-map">
    			<a href="#"><i class="fa fa-map-marker"></i> Kantor Kas: Jl. Pungkur No.80 Bandung</a>
    		</div>
    		<div class="contact-phone">
    			<a href="#"><i class="fa fa-phone"></i> (022) 203 8582</a>
    		</div>
    		<div class="contact-email">
    			<a href="#"><i class="fa fa-envelope"></i> info@bprbmu.co.id</a>
    		</div>
		</div>

		<!-- #Header Starts -->
		<nav class="navbar navbar-default">
    		<div class="container-fluid">
        		<!-- Brand and toggle get grouped for better mobile display -->
        		<div class="navbar-header">
            		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
            		</button>
            		<a class="navbar-brand" id="navbar-brand" href="#"><img class="logo" src="<?= SITE_URL."assets/images/logo.png" ?>" alt="logo"></a>
        		</div>
        
        		<!-- Collect the nav links, forms, and other content for toggling -->
        		<div class="collapse navbar-collapse navbar-right" id="navbar">
            		<ul class="nav navbar-nav">
		                <li><a href="https://bprbmu.co.id">Home</a></li>
		                <li class="dropdown"><a href="#">Tentang BMU</a>
		                    <ul class="dropdown-menu">
		                        <li><a href="https://bprbmu.co.id/pages/sejarah-visi-misi/">Sejarah & Visi Misi</a></li>
		                        <li><a href="https://bprbmu.co.id/pages/kepemilikan-pengurus/">Kepemilikan & Pengurus</a></li>
		                        <li><a href="https://bprbmu.co.id/pages/laporan-publikasi/">Laporan Publikasi</a></li>
		                    </ul>
		                </li>
	                	<li class="dropdown"><a href="#">Produk</a>
	                    	<ul class="dropdown-menu">
	                        	<li><a href="https://bprbmu.co.id/pages/kredit/">Kredit</a></li>
	                        	<li><a href="https://bprbmu.co.id/pages/deposito/">Deposito</a></li>
	                        	<li><a href="https://bprbmu.co.id/pages/tabungan/">Tabungan</a></li>
	                        	<li><a href="#" onclick="simulasi(0)">Simulasi Kredit</a></li>                            
	                    	</ul>
	                	</li>
		                <li><a href="https://bprbmu.co.id/pages/informasi/">Informasi</a></li>
		                <li><a href="https://bprbmu.co.id/pages/kontak/">Kontak</a></li>
		                <li class="active"><a href="https://bprbmu.co.id/pages/permohonan-kredit/">Permohonan Kredit</a></li>
 	           		</ul>
        		</div><!-- /.navbar-collapse -->    
    		</div><!-- /.container-fluid -->
		</nav>
		<!-- #Header End -->

		
		<!-- FORM PENGAJUAN PERMOHONAN KREDIT -->

		<div class="container-fluid">
			<div class="section-title text-center wowload fadeInUp">
				<h3>Permohonan Kredit</h3>
			</div>

			<div class="container wowload fadeInUp">
				<form class="form-horizontal" id="form_permohonan_kredit" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12 col-xs-12">

							<div class="row">
								<div class="col-md-6 col-xs-12">
									<!-- No. FPK -->
									<div class="form-group field-id has-feedback">
										<label class="control-label col-sm-2" for="id_fpk">No. FPK: </label>
										<div class="col-sm-10">
											<input type="text" id="id" class="form-control field" placeholder="" value="<?= $data['id'] ?>" readonly>
										</div>
										<span class="help-block small pesan pesan-id"></span>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<!-- Tanggal -->
									<div class="form-group field-tgl has-feedback">
										<label class="control-label col-sm-2" for="no_fpk">Tanggal: </label>
										<div class="col-sm-10">
											<input type="text" id="tgl" class="form-control field" placeholder="" value="<?= $data['tgl'] ?>" readonly>
										</div>
										<span class="help-block small pesan pesan-tgl"></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">

									<!-- accordian panel data -->
									<div class="panel-group" id="accordion">

										<!-- Panel Data Pinjaman -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion1" href="#collapse_peminjaman">1. DATA PINJAMAN</a>
												</h4>
											</div>	
											<div id="collapse_peminjaman" class="panel-collapse collapse in">
												<div class="panel-body">
													<?php include_once('form/form_pinjaman.php'); ?>
												</div>
											</div>
										</div>
											
										<!-- Panel Data Permohonan -->
										<div class="panel panel-default">
											<div class="panel-heading">	
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion2" href="#collapse_permohonan">2. DATA PERMOHONAN</a>
												</h4>
											</div>
											<div id="collapse_permohonan" class="panel-collapse collapse">
												<div class="panel-body">
													<?php include_once('form/form_permohonan.php'); ?>
												</div>
											</div>
										</div>
											
										<!-- Panel Data Pekerjaan -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion3" href="#collapse_pekerjaan">3. DATA PEKERJAAN / DATA USAHA</a>
												</h4>
											</div>
											<div id="collapse_pekerjaan" class="panel-collapse collapse">
												<div class="panel-body">
													<?php include_once('form/form_pekerjaan.php'); ?>
												</div>
											</div>
										</div>
											
										<!-- Panel Data Agunan -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion4" href="#collapse_agunan">4. DATA AGUNAN</a>
												</h4>
											</div>	
											<div id="collapse_agunan" class="panel-collapse collapse">
												<div class="panel-body">
													<?php include_once('form/form_agunan.php'); ?>
												</div>
											</div>
										</div>

										<!-- Panel Data Keluarga -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion5" href="#collapse_keluarga">5. DATA KELUARGA TERDEKAT YANG TIDAK SERUMAH</a>
												</h4>
											</div>
											<div id="collapse_keluarga" class="panel-collapse collapse">
												<div class="panel-body">
													<?php include_once('form/form_keluarga.php'); ?>
												</div>
											</div>
										</div>
											
										<!-- Panel Data Upload -->
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion6" href="#collapse_upload">6. UPLOAD PERSYARATAN KREDIT</a>
												</h4>
											</div>
											<div id="collapse_upload" class="panel-collapse collapse">
												<div class="panel-body">
													<?php include_once('form/form_upload.php'); ?>
												</div>
											</div>
										</div>

									</div>
									<!-- end accordian -->
								</div>
							</div>

						</div>
					</div>
					
					<!-- button -->
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="form-group text-center">
								<button type="submit" id="submit_permohonan_kredit" class="btn btn-success" value="<?= $data["action"] ?>">SUBMIT DATA PERMOHONAN</button>
								<button type="reset" class="btn btn-info">RESET DATA</button>
							</div>
						</div>
					</div>

				</form>
						
			</div>
		</div>

		<!-- END FORM -->

		
		<!-- Footer Starts -->
		<div class="footer text-center spacer">        
		    
		    <p class="logo-footer" href="index.html"><img src="<?= SITE_URL."assets/images/favicon.png" ?>" align="middle"/></p>
		    <p class="company-name">PT BPR BINA MAJU USAHA</p>
		    
		    <p class="footer-description">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-6">
		                    <div class="office">
		                        <p class="title"> KANTOR PUSAT</p>
		                        <p class="desc"><i class="fa fa-map-marker"></i> Jl. Setiabudhi No.170 A Bandung</p>
		                        <p class="desc"><i class="fa fa-phone"></i> (022) 203 8582  Fax: (022) 203 8585</p>
		                        <p class="desc"><i class="fa fa-envelope"></i> info@bprbmu.co.id</p>
		                    </div>                                    
		                </div>
		                <div class="col-md-6">                    
		                    <div class="office">
		                        <p class="title"> KANTOR KAS</p>
		                        <p class="desc"><i class="fa fa-map-marker"></i> Jl. Pungkur No.80 Bandung</p>
		                        <p class="desc"><i class="fa fa-phone"></i> (022) 520 1010</p>
		                        <p class="desc"><i class="fa fa-envelope"></i> info@bprbmu.co.id</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </p>        

		    <p>
		        Copyright 2016<a href="https://bprbmu.co.id" target="_blank">BPR BMU | PT BPR Bina Maju Usaha</a>All rights reserved.
		        Developed by<a href="https://piespi.co.id" target="_blank">Piespi Corporation</a>
		        <!-- <br><a href="https://bprbmu.co.id:2096" target="_blank">Webmail</a> --->
		    </p>    
		</div>
		<!-- # Footer Ends --
		<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a> -->


		<!-- jquery--->
		<script src="<?= SITE_URL."assets/jquery.js" ?>"></script>

		<!-- sweet alert 2 -->
		<script src="<?= BASE_URL."assets/bower_components/sweetalert/sweetalert.min.js"; ?>"></script>
		<!-- toastr -->
		<script src="<?= BASE_URL."assets/bower_components/toastr/build/toastr.min.js"; ?>"></script>
		<script type="text/javascript">
			// init toastr
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
		</script>

		<script>
			var BASE_URL = "<?php print BASE_URL; ?>";
			var SITE_URL = "<?php print SITE_URL; ?>";
			var urlParams = <?php echo json_encode($_GET, JSON_HEX_TAG);?>;
			
			/**
			*
			*/
			function setNotif(notif){
				if(notif.plugin == 'swal'){
					swal(notif.title, notif.message, notif.type);
				}
				else if(notif.plugin == 'toastr'){
					switch(notif.type){
						case 'success':
							toastr.success(notif.message, notif.title);
							break;
						case 'warning':
							toastr.warning(notif.message, notif.title);
							break;
						case 'error':
							toastr.error(notif.message, notif.title);
							break;
						default:
							toastr.info(notif.message, notif.title);
							break; 
					}
				}
			}
		</script>
		
		<!-- wow script --->
		<script  src="<?= SITE_URL."assets/wow/wow.min.js" ?>"></script>

		<!-- boostrap --->
		<script  src="<?= SITE_URL."assets/bootstrap/js/bootstrap.min.js" ?>" type="text/javascript" ></script>

		<!-- jquery mobile --->
		<script  src="<?= SITE_URL."assets/mobile/touchSwipe.min.js" ?>"></script>
		<script  src="<?= SITE_URL."assets/respond/respond.min.js" ?>"></script>

		<!-- slider --->
		<script  src="<?= SITE_URL."assets/slider/jquery.flexslider-min.js" ?>" type="text/javascript"></script>

		<!-- portfolio --->
		<script  type="text/javascript" src="<?= SITE_URL."assets/portfolio/js/custom.js" ?>"></script>
		<script  type="text/javascript" src="<?= SITE_URL."assets/portfolio/js/jquery.nicescroll.min.js" ?>"></script>
		<script  src="<?= SITE_URL."assets/portfolio/js/jquery.themepunch.revolution.min.js?rev=5.0" ?>"></script> 
		<script  src="<?= SITE_URL."assets/portfolio/js/plugins.js" ?>"></script> 
		<script  src="<?= SITE_URL."assets/portfolio/js/scripts.min.js" ?>"></script>

		<!-- Owl Carosel --->
		<script  src="<?= SITE_URL."assets/owl/js/owl.carousel.min.js" ?>"></script>

		<!-- gallery -->
		<script  src="<?= SITE_URL."assets/gallery/js/jquery.magnific-popup.min.js" ?>"></script>
		<script  src="<?= SITE_URL."assets/gallery/js/gallery-custom.js" ?>"></script>

		<!-- Send Mail --->
		<script  src="<?= SITE_URL."assets/email/email.js" ?>"></script>

		<!-- scroll hide script --->
		<script  src="<?= SITE_URL."assets/scroll-hide/scroll-hide.js" ?>"></script>

		<!-- custom script --->
		<script  src="<?= SITE_URL."assets/script.js" ?>"></script>

		<!-- simulasi --->
		<script src="<?= SITE_URL."assets/simulasi/bootbox.min.js" ?>"></script>
		<script src="<?= SITE_URL."assets/simulasi/simulasi.js" ?>"></script>

		<!-- js form pengajuan kredit -->
		<script src="<?= BASE_URL."app/views/permohonan_kredit/js/initForm.js" ?>"></script>
	</body>
</html>


		