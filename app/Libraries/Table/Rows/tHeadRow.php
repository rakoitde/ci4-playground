<?php

namespace App\Libraries\Table\Rows;

class tHeadRow extends Row
{

    public function __construct()
    {
        parent::__construct();
        $this->View($this->theme->thead['row']);
        $this->Class($this->theme->thead['row_classes']);
    }

    public function __toString()
    {
        return $this->Render();
    }

}