<?php

namespace App\Libraries\Table\Columns;

#use App\Libraries\Table\Columns\Column;

class SelectRowColumn extends Column
{

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->Selectable(false);
    }

    public function getCell($row): string
    {

        #$value = $row->{$this->name} ?? $row->id;

        $cell = '<td'.$this->getClasses().'><input type="checkbox"></td>';

        return $cell;
    }

    public function getHeaderCell(): string
    {

        $cell = '<th'.$this->getClasses().'><input type="checkbox"></th>';

        return $cell;
    }
	
}