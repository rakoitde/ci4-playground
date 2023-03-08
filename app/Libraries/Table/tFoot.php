<?php

namespace App\Libraries\Table;

use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

class tFoot extends TableElement
{

    use hasClass;
    use hasView;

    public function __toString()
    {
        $this->View( $this->theme->tfoot['view'] );
        $this->Class( $this->theme->tfoot['classes'] );
        return $this->Render();
    }

}