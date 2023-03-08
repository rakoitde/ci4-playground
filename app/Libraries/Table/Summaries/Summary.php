<?php

namespace App\Libraries\Table\Summaries;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

use CodeIgniter\Config\BaseConfig;

abstract class Summary
{

    use hasClass;
    use hasView;

	protected string $default_summary;

	protected BaseConfig $config;

	protected BaseConfig $theme;

	public function __construct(string $default_summary = "")
	{
		$this->default_summary = $default_summary;
        $this->config = config('App\Libraries\Table\Config\Table');
        $this->theme = config($this->config->theme);
	}

}