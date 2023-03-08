<?php

namespace App\Libraries\Table\Traits;

use App\Libraries\Table\Conditions\Condition;

trait hasAttributes
{

    private array $attributes = [];


    public function Attribute(string $key, string $value): self
    {

        $this->attributes[$key]=$value;

        return $this;

    }

    public function getAttributes():string
    {

        if (count($this->attributes)<1) { return ""; }

        $attributes = '';

        foreach ($this->attributes as $key => $value) {
            $attributes.= ' '.$key.'="'.$value.'"';
        }

        return $attributes;
    }
}