<?php

namespace App\Libraries;

use App\Libraries\Table\Table;

use App\Libraries\Table\Columns\Column;
use App\Libraries\Table\Columns\TextColumn;
use App\Libraries\Table\Columns\ActionColumn;
use App\Libraries\Table\Columns\IntColumn;
use App\Libraries\Table\Columns\SelectRowColumn;

use App\Libraries\Table\Conditions\Condition;
use App\Libraries\Table\Conditions\Operator;

use App\Libraries\Table\Filter\TextFilter;

class CompanyTable extends Table
{

	protected string $modelname = 'App\Models\CompanyModel';

	protected function defineColumns()
	{

        $this->Class("table-sm");

        $this->Columns(
            (new SelectRowColumn('id')),
            (new Column('id'))           ->Label('#'),
            (new TextColumn('name'))     ->Label('Name')  ->Filter( new TextFilter() ),
            (new TextColumn('street'))   ->Label('Straße'),
            (new IntColumn('postcode'))  ->Label('PLZ'),
            (new TextColumn('city'))     ->Label('Ort')   ->Filter( new TextFilter() ),
            (new ActionColumn('buttons'))->Label(""),
        );
	}

}