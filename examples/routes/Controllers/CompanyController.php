<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CompanyModel;

class CompanyController extends BaseController
{

    private CompanyModel $companyModel;

    private string $uri;

    private array $breadcrumbs;

    /**
     * Constructs a new instance.
     */
    public function __construct()
    {
        $this->companyModel = model(CompanyModel::class);
        $this->uri          = 'company';

        $this->addBreadcrumb('Home', '');
    }

    /**
     * List all selected entities
     * 
     * GET  uri index()
     */
    public function index()
    {
        $companies = $this->companyModel->findAll();

        $this->addBreadcrumb('Companies', $this->uri, true);

        $data = [
            'companies'   => $companies,
            'breadcrumbs' => $this->breadcrumbs,
        ];

        return view('Company/list', $data);
    }

    /**
     * Show selected entity readonly
     * 
     * GET uri/(:num) show($id)
     *
     * @param      string  $id     The identifier
     *
     * @return     string  ( rendered view )
     */
    public function show(string $id): string
    {
        $company = $this->companyModel->find($id);

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($company->name, $this->uri, true);

        $data = [
            'company'     => $company,
            'breadcrumbs' => $this->breadcrumbs,
            'action'      => '',
        ];

        return view("Company/show", $data);
    }

    /**
     * Edit selected entity
     * 
     * GET uri/edit/(:num) edit($id)
     *
     * @param      string  $id     The identifier
     *
     * @return     string  ( rendered view )
     */
    public function edit($id)
    {

        $session = session();

        $company = $this->companyModel->find($id);

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($company->name, $this->uri, true);

        $data = [
            'company'     => $company,
            'breadcrumbs' => $this->breadcrumbs,
            'errors'      => $session->getFlashdata('errors') ? $session->getFlashdata('errors') : [],
            'action'      => $this->uri.'/update/'.$id,
        ];
        return view("Company/edit", $data);
    }

    /**
     * Update selected entity
     * 
     * POST uri/update/(:num) update($id)
     *
     * @return     string  ( rendered view )
     */
    public function update($id)
    {

        if ( $this->request->getMethod() === 'post' ) {

            $company = $this->companyModel->find($id);
            $company->fill( $this->request->getPost() );

            if ( $company->hasChanged() ) {

                if ( $this->companyModel->update($id, $company) === false ) {

                    return redirect()->back()->with('errors', $this->companyModel->errors())->withInput();

                }
            }

            return $this->response->redirect( base_url('company/' . $id) );
        }

        return $this->edit($id);
    }

    /**
     * Shows a new empty entity
     *
     * GET  company/new new()
     * 
     * @return     string  ( rendered view )
     */
    public function new(): string
    {

        $session = session();

        $company = new $this->companyModel->returnType;

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb('New', $this->uri, true);

        $data = [
            'company'     => $company,
            'breadcrumbs' => $this->breadcrumbs,
            'errors'      => $session->getFlashdata('errors') ? $session->getFlashdata('errors') : [],
            'action'      => $this->uri.'/create',
        ];

        return view("Company/new", $data);

    }

    /**
     * Creates a new entity with posted data
     * 
     * POST company/create create()
     *
     * @return     string  ( description_of_the_return_value )
     */
    public function create(): string
    {

        if ( $this->request->getMethod() === 'post' ) {

            $company = new $this->companyModel->returnType;
            $company->fill( $this->request->getPost() );

            if ( $this->companyModel->insert($company, false) === false ) {

                d($this->companyModel->errors());
                return redirect()->back()->with('errors', $this->companyModel->errors())->withInput();

            }

            $id = $this->companyModel->getInsertID();

            return $this->response->redirect( base_url('company/' . $id) );
        }

        return $this->edit($id);
    }

    /**
     * Deletes the given identifier.
     *
     * @param      string  $id     The identifier
     *
     * @return     string  ( rendered view )
     */
    public function delete(string $id): string
    {
        $company = $this->companyModel->find($id);


        if ( $this->request->getMethod() === 'post' ) {

            if ( $this->companyModel->delete($id) === false ) {

                d($this->companyModel->errors());
                return redirect()->back()->with('errors', $this->companyModel->errors())->withInput();

            }

            return $this->response->redirect( base_url('company') );
        }

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($company->name, $this->uri, true);

        $data = [
            'company'     => $company,
            'breadcrumbs' => $this->breadcrumbs,
            'action'      => $this->uri.'/delete/'.$id,
        ];

        return view("Company/delete", $data);
    }

    /**
     * { function_description }
     *
     * @param      <type>  $data   The data
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function form($data)
    {

        $uri = $this->uri;

        $data['action'] = isset($data['action']) ? $data['action'] : '';

        $data['readonly_attr']   = $data['action']==='' || str_contains($data['action'], 'delete') ? 'readonly' : '';
        $data['plaintext_class'] = $data['action']==='' || str_contains($data['action'], 'delete') ? 'form-control-plaintext' : '';

        return view("Company/form", $data);
    }

    private function addBreadcrumb(string $text, string $href, bool $isactive = false)
    {
        $breadcrumb = new \stdClass();
        $breadcrumb->text   = $text;
        $breadcrumb->href   = $href;
        $breadcrumb->isactive = $isactive;
        $this->breadcrumbs[] = $breadcrumb;
    }

}