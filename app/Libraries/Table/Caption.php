<?php

namespace App\Libraries\Table;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

class Caption extends TableElement
{

    use hasView;

    public function __toString()
    {
        $this->view = $this->theme->caption;
        return $this->innerhtml ? $this->Render() : "";
    }

}