<?php

namespace App\Libraries\Table\Columns;

class ActionColumn extends Column
{
    public function __construct(string $name)
    {
    	parent::__construct($name);
        $this->Selectable(false);
        $this->Sortable(false);
        $this->Filterable(false);
    }
}