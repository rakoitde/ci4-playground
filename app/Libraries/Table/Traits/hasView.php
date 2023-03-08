<?php

namespace App\Libraries\Table\Traits;

trait hasView
{
    protected string $view = '';

    protected string $innerhtml = '';

    public function View(string $view)
    {
        $this->view = $view;
    }

    public function Render(string ...$innerhtml)
    {

        foreach ($innerhtml as $str) {
            $this->innerhtml.=$str;
        }

        $data['{attributes}'] = isset($this->attributes) ? $this->getAttributes() : '';
        $data['{classes}']    = isset($this->classes)    ? $this->getClasses()    : '';
        $data['{dataset}']    = isset($this->dataset)    ? $this->getDataset()    : '';
        $data['{innerhtml}']  = isset($this->innerhtml)  ? $this->innerhtml       : '';
        $data['{sorthtml}']   = isset($this->sorthtml)   ? $this->sorthtml        : '';
        $data['{filterhtml}'] = isset($this->filterhtml) ? $this->filterhtml      : '';
        $data['{label}']      = isset($this->label)      ? $this->getLabel()      : '';

        $view = str_replace(array_keys($data), array_values($data), $this->view);

        return $view;
    }
}