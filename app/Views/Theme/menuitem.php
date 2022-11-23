<?php

$submenue           = new \stdClass();
$submenue->id       = 'notification';
$submenue->isactive = true;
$submenue->linktext = 'Benachrichtigungen';
$submenue->href     = 'about/notification';

$mi              = new \stdClass();
$mi->id          = 'about';
$mi->isactive    = true;
$mi->hassubmenu  = false;
$mi->submenues[] = $submenue;
$mi->linktext    = 'Über';
$mi->href        = 'about';
$mi->iconclass   = 'bi-files';

$active = $mi->isactive ? 'active' : '';

?>

<li class="nav-item">
	<a class="nav-link <?= $active ?>" href="<?= base_url($mi->href) ?>">
		<span class="nav-icon">
			<span class="bi bi-house-door" width="1em" height="1em"></span>
			<img src="/public/bootstrap-icons/icons/bootstrap.svg" alt="Bootstrap" width="32" height="32">
		</span>
		<span class="nav-link-text"><?= $mi->linktext ?></span>
	</a>
</li>