<?php

namespace App\Libraries\Table\Traits;

trait isSelectable
{

    private bool $selectable = true;

    private bool $selected = true;

    public function Selectable(bool $selectable = true): self
    {

        $this->selectable = $selectable;

        return $this;

    }

    public function isSelectable(): bool
    {

        return $this->selectable;
    }

   public function Selected(bool $selected = true): self
    {

        $this->selected = $selected;

        return $this;

    }

    public function isSelected(): bool
    {

        return $this->selected;
    }


}