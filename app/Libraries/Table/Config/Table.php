<?php

namespace App\Libraries\Table\Config;

use CodeIgniter\Config\BaseConfig;

class Table extends BaseConfig
{
    public $theme = "App\Libraries\Table\Config\TableBootstrap5";

    public bool $paginate = true;

    public int $perpage = 15;
}
