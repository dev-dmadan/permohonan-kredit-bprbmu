<?php Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung"); ?>

<!-- Header -->
<header class="main-header">
	<!-- logo -->
	<a href="" class="logo">
		<!-- logo mini -->
		<span class="logo-mini">PK</span>
		<!-- logo default -->
		<span class="logo-lg">Permohonan Kredit</span>
	</a>

	<!-- header navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- sidebar toggle button -->
		<a href="javascript:void(0)" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
	  	</a>
	  	<!-- navbar menu notifikasi, profil -->
	  	<div class="navbar-custom-menu">
	  		<ul class="nav navbar-nav">
	          	<!-- user account menu -->
	          	<li class="dropdown user user-menu">
		            <!-- Menu Toggle Button -->
		            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
		              	<!-- The user image in the navbar-->
		              	<img src="<?= BASE_URL."assets/images/user/default.jpg"; ?>" class="user-image" alt="User Image">
		              	<!-- hidden-xs hides the username on small devices so only the image appears. -->
		              	<span class="hidden-xs">Admin</span>
		            </a>
		            <ul class="dropdown-menu">
		              	<!-- The user image in the menu -->
		              	<li class="user-header">
		                	<img src="<?= BASE_URL."assets/images/user/default.jpg" ?>" class="img-circle" alt="User Image">
		                	<p>
		                  		Admin Permohonan Kredit
		                	</p>
		              	</li>
	              		<!-- Menu Footer-->
	              		<li class="user-footer">
	                		<div class="pull-right">
	                  			<a href="<?= BASE_URL.'login/logout' ?>" class="btn btn-default btn-flat">Sign out</a>
	                		</div>
	              		</li>
		            </ul>
		    	</li>
		    	<!-- end user acoount menu -->

	  		</ul>
	  	</div>
	  	<!-- end navbar menu notifikasi, profil -->

	</nav>
	<!-- end navbar -->

</header>
<!-- end header -->