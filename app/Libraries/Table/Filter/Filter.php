<?php

namespace App\Libraries\Table\Filter;

use CodeIgniter\Config\BaseConfig;

abstract class Filter
{

    protected BaseConfig $config;

    protected BaseConfig $theme;

    public function __construct()
    {
        $this->config = config('App\Libraries\Table\Config\Table');
        $this->theme = config($this->config->theme);
    }

}