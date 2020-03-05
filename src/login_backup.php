<?php include "koneksi.php" ?>

<html>
<head>
	<title>Login | Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="header-title">
				PERPUSTAKAAN ONLINE PENS<br>
				<div style="font-size: 26px;">PROJECT WORKSHOP DATABASE</div>
			</div>
		</div>
		
		<ul id="navbar">
			<li class="navbar-left"><a href="index.php" style="border-right: 1px solid #0a3363">Home</a></li>
			<li class="navbar-left"><a href="page/buku/daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-kanan"><a href="#" data-toggle="modal" data-target="#formLogin" class="navbar-login">Login</a></li>
		</ul>

		<!-- FORM LOGIN -->
	    <div id="formLogin" class="modal fade" tabindex="-1" role="dialog">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header" style="border-bottom: 4px solid #f3c701;">
	            		<button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
	              			<span aria-hidden="true">&times;</span>
	            		</button>
	            		<h4 class="title" id="titleModal">Form Login</h4>
	          		</div>
	          
	          		<div class="modal-body">
			            <form action="check_login.php" method="post">
				            <div class="form-group">
				            	<label for="username">Username</label>
				                <input type="text" name="username" placeholder="Username" class="form-control" />
				            </div>
				            <div class="form-group">
				                <label for="password">Password</label>
				                <input type="text" name="password" placeholder="Password" class="form-control" />
				            </div>
				            <div class="text-right">
				                <button class="btn btn-danger" type="submit">Login</button>
				            </div>
			            </form>
	          		</div>
	        	</div>
	        </div>
	    </div>

		<div id="main" align="center">
		</div>
	</div>

	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>