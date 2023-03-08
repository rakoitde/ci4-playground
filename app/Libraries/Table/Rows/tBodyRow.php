<?php

namespace App\Libraries\Table\Rows;

class tBodyRow extends Row
{

    public function __construct()
    {
        parent::__construct();
        $this->View($this->theme->tbody['row']);
        $this->Class($this->theme->tbody['row_classes']);
    }

    public function __toString()
    {
        return $this->Render();
    }

}