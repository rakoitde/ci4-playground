<!-- Layout -->
<?= $this->extend('App\Views\Theme\layout', $this->data) ?>

<!-- Custom CSS -->
<?= $this->section('custom_css') ?>
<?= $this->endSection() ?>

<!-- Content -->
<?= $this->section('content') ?>
<!-- ################ Start: Content ################ -->


<h1>Company - List</h1>

<a role="button" href="<?= base_url('route/new') ?>" class="btn btn-primary">New</a>    

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>name</th>
			<th>street</th>
			<th>postcode</th>
			<th>state</th>
			<th>city</th>
			<th>country</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($routes as $route) : ?>

		<tr>
			<th><?= $route->id ?></th>
			<td><?= $route->vorname ?></td>
			<td><?= $route->nachname ?></td>
			<td><?= $route->postcode ?></td>
			<td><?= $route->state ?></td>
			<td><?= $route->city ?></td>
			<td><?= $route->country ?></td>
			<td>
				<a class="btn btn-primary" href="<?= base_url('route/'.$route->id) ?>" role="button">Show</a>
				<a class="btn btn-primary" href="<?= base_url('route/edit/'.$route->id) ?>" role="button">Edit</a>
				<a class="btn btn-danger" href="<?= base_url('route/delete/'.$route->id) ?>" role="button">Delete</a>
			</td>
		</tr>

<?php endforeach ?>

	</tbody>
</table>

<!-- ################ Stop: Content ################ -->
<?= $this->endSection() ?>

<!-- Custom JS -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>