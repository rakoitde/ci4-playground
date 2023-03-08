<?php

namespace App\Libraries\Table\Filter;

use App\Libraries\Table\Filter\Filter;

class TextFilter extends Filter
{

    public function __toString()
    {
        return $this->theme->textfilter['view'];
    }

}