<?php

/**
 * This file is part of CodeIgniter 4 Themes.
 *
 * (c) 2022 Ralf Kornberger <rakoitde@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

$layoutpath ??= 'App\Views\Theme\\';
$this->setVar('layoutpath', $layoutpath);

if (! isset($breadcrumbs)) {
    $breadcrumb           = new \stdClass();
    $breadcrumb->text     = 'Home';
    $breadcrumb->href     = '';
    $breadcrumb->isactive = true;
    $breadcrumbs[]        = $breadcrumb;
    $this->setVar('breadcrumbs', $breadcrumbs);
}

if (! isset($title)) {
    $title = \Config\App::$title ?? 'Application';
    $this->setVar('title', $title);
}

if (! isset($subtitle) && count($breadcrumbs) > 0) {
    $lastBreadcrumb = $breadcrumbs[count($breadcrumbs) - 1];
    $subtitle       = $lastBreadcrumb->text;
    $this->setVar('subtitle', $subtitle);
}

echo $this->include($layoutpath . 'head', $this->data);
echo $this->renderSection('content');
echo $this->include($layoutpath . 'foot', $this->data);
