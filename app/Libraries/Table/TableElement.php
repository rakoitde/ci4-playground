<?php

namespace App\Libraries\Table;

use CodeIgniter\Config\BaseConfig;

class TableElement
{

    protected BaseConfig $config;

    protected BaseConfig $theme;

	public function __construct(string $innerhtml = "")
	{
		$this->innerhtml = $innerhtml;
		$this->config = config('App\Libraries\Table\Config\Table');
		$this->theme = config($this->config->theme);
	}

}