<?php

namespace App\Libraries\Table\Traits;

use App\Libraries\Table\Conditions\Condition;

trait hasClass
{

    protected string $class = '';

    private array $classes = [];

    private array $conditions = [];


    public function Class(array | string $classes, array | Condition $condition = []): self
    {

        if (!is_array($classes)) {
            $classes = explode(" ", $classes);
        }

        $this->classes = array_merge($this->classes, $classes);

        return $this;

    }

    public function getClasses():string
    {

        $this->Class($this->class);

        if (count($this->classes)<1) { return ""; }

        return ' class="'.trim(implode(" ", $this->classes)).'"';
    }
}