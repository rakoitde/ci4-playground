<!-- Layout -->
<?= $this->extend('App\Views\Theme\layout', $this->data) ?>

<!-- Custom CSS -->
<?= $this->section('custom_css') ?>
<?= $this->endSection() ?>

<!-- Content -->
<?= $this->section('content') ?>
<!-- ################ Start: Content ################ -->


<h1>Company - Show</h1>

<?= view_cell('\Examples\Routes\Controllers\RoutesController::form', ['data' => $this->data]); ?>


<!-- ################ Stop: Content ################ -->
<?= $this->endSection() ?>

<!-- Custom JS -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>