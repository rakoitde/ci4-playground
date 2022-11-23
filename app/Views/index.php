<!-- Layout -->
<?= $this->extend('App\Views\Theme\layout', $this->data) ?>

<!-- Custom CSS -->
<?= $this->section('custom_css') ?>
<?= $this->endSection() ?>

<!-- Content -->
<?= $this->section('content') ?>
<!-- ################ Start: Content ################ -->

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">About</h1>
            <p class="lead text-muted">It's me</p>
        </div>
    </div>
</section>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="col">
        <div class="card shadow-sm">
            <img src="images/codeigniter.png" class="card-img-top" alt="Codeigniter">
            <div class="card-body">
                <p class="card-text">CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="https://www.codeigniter.com" class="btn btn-outline-secondary">Codeigniter</a>
                        <a href="https://www.codeigniter.com/user_guide/index.html" class="btn btn-outline-secondary">Documentation</a>
                        <a href="https://forum.codeigniter.com" class="btn btn-outline-secondary">Forum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm">
            <img src="images/bootstrap.png" class="card-img-top" alt="Codeigniter">
            <div class="card-body">
                <p class="card-text">Build fast, responsive sites with Bootstrap a Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="https://getbootstrap.com" class="btn btn-outline-secondary">Bootstrap</a>
                        <a href="https://getbootstrap.com/docs/5.2/getting-started/introduction/" class="btn btn-outline-secondary">Documentation</a>
                        <a href="https://icons.getbootstrap.com" class="btn btn-outline-secondary">Icons</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ################ Stop: Content ################ -->
<?= $this->endSection() ?>

<!-- Custom JS -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>