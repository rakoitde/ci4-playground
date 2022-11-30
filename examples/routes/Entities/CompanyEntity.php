<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CompanyEntity extends Entity
{
    protected $attributes = [
        'name' => 'New Company', 
        'street' => null,
        'postcode' => '44123',
        'state' => null,
        'city' => null,
        'country' => 'Buxtehude',
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
