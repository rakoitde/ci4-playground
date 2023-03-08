<?php

namespace App\Libraries\Table;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

class tBody extends TableElement
{

    use hasClass;
    use hasView;

    public function __toString()
    {
        $this->View( $this->theme->tbody['view'] );
        $this->Class( $this->theme->tbody['classes'] );
        return $this->Render();
    }

}