<?php

namespace App\Libraries\Table\Rows;

class tFootRow extends Row
{

    protected array $values;

    public function __construct()
    {
        parent::__construct();
        $this->View($this->theme->tfoot['row']);
        $this->Class($this->theme->tfoot['row_classes']);
    }

    public function Values(array $values): self
    {
        $this->values = $values;
        return $this;
    }

    public function __toString()
    {
        return $this->Render();
    }

}