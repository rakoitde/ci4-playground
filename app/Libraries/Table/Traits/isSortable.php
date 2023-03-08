<?php

namespace App\Libraries\Table\Traits;

use App\Libraries\Table\Columns\Direction;


trait isSortable
{

    private bool $sortable = true;

    public ?string $direction = "";

    public function Sortable(bool $sortable = true): self
    {

        $this->sortable = $sortable;

        return $this;

    }

    public function isSortable(): bool
    {

        return $this->sortable;

    }

    public function Direction(Direction $direction): self
    {

        $this->direction = $direction;

        return $this;

    }

    public function None(): self
    {

        $this->direction = Direction::NONE;

        return $this;

    }

    public function Asc(): self
    {

        $this->direction = Direction::ASC;

        return $this;

    }

    public function Desc(): self
    {

        $this->direction = Direction::DESC;

        return $this;

    }

    public function isSorted(): bool
    {
        return !is_null($this->direction);
    }

    public function getSortIcon(): string
    {
        if ($this->direction==Direction::ASC)  { return $this->theme->icon['asc']; }
        if ($this->direction==Direction::DESC) { return $this->theme->icon['desc']; }
        return "";
    }

}