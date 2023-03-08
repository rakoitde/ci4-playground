<?php

namespace App\Libraries\Table\Traits;

use App\Libraries\Table\Columns\Direction;

use App\Libraries\Table\Filter\Filter;


trait isFilterable
{

    protected bool $filterable = false;

    protected bool $filtered = false;

    protected Filter $filter;

    public function Filterable(bool $filterable = true): self
    {
        $this->filterable = $filterable;
        return $this;
    }

    public function isFilterable(): bool
    {
        return $this->filterable;
    }

    public function Filtered(bool $filtered = true): self
    {
        $this->filtered = $filtered;
        return $this;
    }

    public function isFiltered(): bool
    {
        return $this->filtered;
    }

    public function getFilterHtml(): string
    {
        return $this->filterable ? $this->filter : '';   
    }

    public function Filter(Filter $filter): self
    {
        $this->filter = $filter;
        $this->Filterable();

        return $this;
    }

}