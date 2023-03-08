<?php

namespace App\Libraries\Table\Columns;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasLabel;
use App\Libraries\Table\Traits\hasView;
use App\Libraries\Table\Traits\isSelectable;
use App\Libraries\Table\Traits\isSortable;
use App\Libraries\Table\Traits\isFilterable;

use App\Libraries\Table\Filter\Filter;

class Column
{

    use hasLabel;
    use hasClass;
    use hasView;
    use isSelectable;
    use isSortable;
    use isFilterable;

    public string $name;

    protected $config;

    protected $theme;

    protected $values;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->config = config('App\Libraries\Table\Config\Table');
        $this->theme = config($this->config->theme);
    }

    public function getHeaderCell(): string
    {

        $this->innerhtml = $this->getLabel();
        $this->view = $this->theme->thead['cell'];
        $cell = $this->Render(
            $this->getSortIcon(),
            $this->getFilterHtml()
        );
        return $cell;
    }

    public function getCell($row): string
    {

        $this->innerhtml = $row->{$this->name} ?? $row->id;
        $this->view = $this->theme->tbody['cell'];

        return $this->Render();
    }

    public function getFooterCell(array $values = []): string
    {

        $this->values = $values;
        $this->innerhtml = "";
        $this->view = $this->theme->tfoot['cell'];

        return $this->Render();
    }
}