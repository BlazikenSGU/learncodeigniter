<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $this->config->config['pageTitle'] ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php $url = base_url('') ?>
	<link rel="icon" type="image/png" href="link/images/icons/favicon.png" />

	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>/link/css/main.css">

</head>

<body class="animsition">

	<style>
		ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		li {
			position: relative;
			display: inline-block;
		}

		li a {
			text-decoration: none;
			padding: 10px 15px;
			display: block;
			color: black;
		}

		li ul {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #f0f0f0;
			padding: 0;
			margin: 0;
			min-width: 150px;
			z-index: 1000;
		}

		li ul li {
			display: block;

		}

		li ul li a {
			font-family: Poppins-Medium;
			padding: 10px 15px;
			background-color: transparent;
		}

		li:hover>ul {
			display: block;
		}

		/* li a:hover {} */
		li ul li a:hover {
			background-color: #ddd;
		}
	</style>

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
