<?php

namespace App\Libraries\Table\Rows;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;
use App\Libraries\Table\Traits\hasDataset;

use CodeIgniter\Config\BaseConfig;

abstract class Row
{
    use hasClass;
    use hasView;
    use hasDataset;

    public function __construct()
    {
        $this->config = config('App\Libraries\Table\Config\Table');
        $this->theme = config($this->config->theme);
    }

    public function __toString()
    {
        return $this->Render();
    }

}