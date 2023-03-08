<?php

namespace App\Libraries\Table\Traits;

use App\Libraries\Table\Conditions\Condition;

trait hasDataset
{

    private array $dataset = [];


    public function Data(string $key, string $value): self
    {

        $this->dataset[$key]=$value;

        return $this;

    }

    public function getDataset():string
    {

        if (count($this->dataset)<1) { return ""; }

        $dataset = '';

        foreach ($this->dataset as $key => $value) {
            $dataset.= ' data-'.$key.'="'.$value.'"';
        }

        return $dataset;
    }
}