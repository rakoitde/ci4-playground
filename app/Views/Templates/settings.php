<!-- Layout -->
<?= $this->extend('App\Views\Layout\layout', $this->data) ?>

<!-- Custom CSS -->
<?= $this->section('custom_css') ?>
<?= $this->endSection() ?>

<!-- Content -->
<?= $this->section('content') ?>
<!-- ################ Start: Content ################ -->

                <hr class="mb-4">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <h4 class="">General</h4>
                        <div class="fs-6 fw-light">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="">
                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Business Name
                                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                <span class="bi bi-info-circle"></span>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" id="setting-input-1" value="Lorem Ipsum Ltd." required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Contact Name</label>
                                        <input type="text" class="form-control" id="setting-input-2" value="Steve Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-3" class="form-label">Business Email Address</label>
                                        <input type="email" class="form-control" id="setting-input-3" value="hello@companywebsite.com">
                                    </div>
                                    <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Plan</h3>
                        <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <div class="mb-2"><strong>Current Plan:</strong> Pro</div>
                                <div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div>
                                <div class="mb-2"><strong>Expires:</strong> 2030-09-24</div>
                                <div class="mb-4"><strong>Invoices:</strong> <a href="#">view</a></div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <a class="btn app-btn-primary" href="#">Upgrade Plan</a>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn app-btn-secondary" href="#">Cancel Plan</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Data &amp; Privacy</h3>
                        <div class="section-intro">Settings section intro goes here. Morbi vehicula, est eget fermentum ornare. </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-1" checked>
                                        <label class="form-check-label" for="settings-checkbox-1">
                                            Keep user app activity history
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-2" checked>
                                        <label class="form-check-label" for="settings-checkbox-2">
                                            Keep user app preferences
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-3">
                                        <label class="form-check-label" for="settings-checkbox-3">
                                            Keep user app search history
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-4">
                                        <label class="form-check-label" for="settings-checkbox-4">
                                            Lorem ipsum dolor sit amet
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-5">
                                        <label class="form-check-label" for="settings-checkbox-5">
                                            Aenean quis pharetra metus
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Notifications</h3>
                        <div class="section-intro">Settings section intro goes here. Duis velit massa, faucibus non hendrerit eget.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
                                        <label class="form-check-label" for="settings-switch-1">Project notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-2">
                                        <label class="form-check-label" for="settings-switch-2">Web browser push notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-3" checked>
                                        <label class="form-check-label" for="settings-switch-3">Mobile push notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-4">
                                        <label class="form-check-label" for="settings-switch-4">Lorem ipsum notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-5">
                                        <label class="form-check-label" for="settings-switch-5">Lorem ipsum notifications</label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">

<!-- ################ Stop: Content ################ -->
<?= $this->endSection() ?>

<!-- Custom JS -->
<?= $this->section('custom_js') ?>
<?= $this->endSection() ?>