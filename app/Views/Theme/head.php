<!DOCTYPE html>
<html lang="de">
<head>
	<title><?= $title ?> - <?= $subtitle ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="<?= $title ?> - <?= $subtitle ?>">
	<meta name="author" content="Ralf Kornberger">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Bootstrap Icons CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<!-- Custom Main CSS -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url('css/AppThemeBS5.min.css') ?>">

	<?= $this->renderSection('custom_css') ?>

</head>

<body class="app">

	<!-- Start: Header -->
	<?= $this->include($layoutpath . '\header', $this->data) ?>
	<!-- End: Header -->

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-2 pt-lg-3">
			<div class="container-xl">

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<?php foreach ($breadcrumbs as $breadcrumb) : ?>
						<li class="breadcrumb-item<?= $breadcrumb->isactive ? ' active' : '' ?>">
							<?php if ($breadcrumb->isactive) : ?>
							<?= $breadcrumb->text ?>
							<?php else : ?>
							<a href="<?= base_url($breadcrumb->href) ?>"><?= $breadcrumb->text ?></a>
							<?php endif ?>
						</li>
					<?php endforeach ?>
					</ol>
				</nav>