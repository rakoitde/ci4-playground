<?php

namespace Examples\Routes\Entities;

use CodeIgniter\Entity\Entity;

class RoutesEntity extends Entity
{
    protected $attributes = [
        'id'       => null,
        'vorname'  => 'Horst',
        'nachname' => null,
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
