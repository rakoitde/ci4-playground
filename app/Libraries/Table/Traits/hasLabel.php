<?php

namespace App\Libraries\Table\Traits;

trait hasLabel
{
    public string $label;

    public function Label(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {

        $label = $this->label ?? ucfirst($this->name);
        return $label;
    }
}