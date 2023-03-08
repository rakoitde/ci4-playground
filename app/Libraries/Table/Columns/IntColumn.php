<?php

namespace App\Libraries\Table\Columns;

use App\Libraries\Table\Columns\Column;
use App\Libraries\Table\Summaries\IntSummary;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasLabel;
use App\Libraries\Table\Traits\hasView;

class IntColumn extends Column
{



    public function __construct(string $name)
    {
		parent::__construct($name);
		$this->Class('text-end');
    }

    public function getFooterCell(array $values = []): string
    {
        
        $summary = new IntSummary('sum');
        $summary->calculate($values);
d($summary);
        $this->innerhtml = $summary; #$this->getLabel();
        $this->view = $this->theme->tfoot['cell'];

        return $this->Render();
    }
}