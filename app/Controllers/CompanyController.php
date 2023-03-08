<?php

namespace App\Controllers;

use App\Models\CompanyModel;

use CodeIgniter\Config\Factories;

use App\Libraries\CompanyTable;


class CompanyController extends BaseController
{
    public function index()
    {

        $data = [
            'table' => new CompanyTable,
        ];

        return view('company_view', $data);

    }
}
