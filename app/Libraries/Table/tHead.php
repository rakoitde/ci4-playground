<?php

namespace App\Libraries\Table;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

class tHead extends TableElement
{

    use hasClass;
    use hasView;

    public function __toString()
    {
        $this->View( $this->theme->thead['view'] );
        $this->Class( $this->theme->thead['classes'] );
        return $this->Render();
    }

}