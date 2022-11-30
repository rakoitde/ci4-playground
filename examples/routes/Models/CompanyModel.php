<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'company';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\CompanyEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'street', 'postcode', 'state', 'city', 'country'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name'     => 'required',
        'street'   => 'required',
        'postcode' => 'required|exact_length[5]|is_natural',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Sorry. The E-Mail is required.',
        ],
        'street' => [
            'required' => 'Sorry. The Street is required.',
        ],
        'postcode' => [
            'required'     => 'Sorry. The Postcode is required.',
            'exact_length' => 'Sorry. The length must be 5.',
            'is_natural'   => 'Sorry. Only Numbers please!.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
