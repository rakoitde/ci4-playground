<?= $this->include($layoutpath . 'footer', $this->data) ?>

					</div>
				</div>
			</div>


			<!-- Javascript -->
			<script src="<?= base_url('@popperjs/core/dist/umd/popper.min.js') ?>"></script>
			<script src="<?= base_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

			<!-- AppThemeBS5 JS -->
			<script src="<?= base_url('js/AppThemeBS5.js') ?>"></script>

			<!-- Start: Custom JavaScript -->
			<?= $this->renderSection('custom_js') ?>
			<!-- End: Custom JavaScript -->

		</body>
		</html>