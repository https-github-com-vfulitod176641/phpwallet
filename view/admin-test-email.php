<?php
define("IN_WALLET", true);
include '../common.php';

$mysqli = new Mysqli($db_host, $db_user, $db_pass, $db_name);
include "../setup_view.php";
include "../require_admin.php";

use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Buffertools\Buffer;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Deterministic\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Key\PublicKey;
use kornrunner\Keccak;

require __DIR__ . '/../vendor/autoload.php';

$invoices = $mysqli->query('SELECT * from invoices;');

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="<?php echo $fullname
?> admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
	<meta name="keywords" content="admin template, crypto ico admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
	<meta name="author" content="PIXINVENT">
	<title>Admin Test Email -
		<?php echo $fullname ?>
	</title>
	<link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/vendors.css">
	<!-- END VENDOR CSS-->
	<!-- BEGIN MODERN CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/app.css">
	<!-- END MODERN CSS-->
	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/core/menu/menu-types/vertical-compact-menu.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/cryptocoins/cryptocoins.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/wallet.css">
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-compact-menu content-detached-right-sidebar   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="content-detached-right-sidebar">
	<?php include_once('nav.php'); ?>
    <?php include_once('main-menu.php'); ?>
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
					<h3 class="content-header-title mb-0 d-inline-block">Admin Test Email</h3>
					<div class="row breadcrumbs-top d-inline-block">
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/view/admin-settings.php">Admin Settings</a></li>
								<li class="breadcrumb-item"> <a href="/view/admin-wallet.php">Admin Wallet</a> </li>
                                <li class="breadcrumb-item active">Admin Test Email</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content-detached content-left">
				<div class="content-body col-md-12">
<div class="row">
	<h6 class="my-2">Send a test email</h6>
	<div class="col-12">
		<?php printMessages($messages);?>
			<div class="card">
				<div class="card-content collapse show">
					<form class="form-horizontal form-purchase-token" 	action="process-admin-test-email.php" method="POST">
						<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
						<div class="card-body row">
							<div class="col-md-12 col-12 mb-1">
								To: <input class="form-control" name="to">
							</div>
							<div class="col-md-12 col-12 mb-1">
								Subject: <input class="form-control" name="subject">
							</div>
							<div class="col-md-12 col-12 mb-1">
								Body: <textarea class="form-control" name="body"></textarea>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-md-10 col-12 mb-1"></div>
							<div class="col-md-2 col-12 mb-1">
								<input type="submit" class="btn-gradient-primary mt-2" value="Send">
							</div>

						</div>
					</form>

				</div>
			</div>
	</div>
	
</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////-->
	<footer class="footer footer-static footer-transparent">
		<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; <?php
echo date("Y"); ?> Blockstarter, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
	</footer>
	<!-- BEGIN VENDOR JS-->
	<script src="/assets/vendors/js/vendors.min.js" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN MODERN JS-->
	<script src="/assets/js/core/app-menu.js" type="text/javascript"></script>
	<script src="/assets/js/core/app.js" type="text/javascript"></script>
	<!-- END MODERN JS-->
	<!-- BEGIN PAGE LEVEL JS-->
	<!-- END PAGE LEVEL JS-->
</body>

</html>
