<?php

namespace Examples\Routes\Controllers;

use App\Controllers\BaseController;

use Examples\Routes\Models\RoutesModel;

class RoutesController extends BaseController
{

    private RoutesModel $routesModel;

    private string $uri;

    private array $breadcrumbs;

    /**
     * Constructs a new instance.
     */
    public function __construct()
    {
        $this->routesModel = model(RoutesModel::class);
        $this->uri          = 'route';

        $this->addBreadcrumb('Home', '');
    }

    /**
     * List all selected entities
     * 
     * GET  uri index()
     */
    public function index()
    {
        $routes = $this->routesModel->findAll();

        $this->addBreadcrumb('Routes', $this->uri, true);

        $data = [
            'routes'   => $routes,
            'breadcrumbs' => $this->breadcrumbs,
        ];

        return view('Examples\Routes\Views\list', $data);
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
        $route = $this->routesModel->find($id);

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($route->name && '', $this->uri, true);

        $data = [
            'route'       => $route,
            'breadcrumbs' => $this->breadcrumbs,
            'action'      => '',
        ];

        return view("Examples\Routes\Views\show", $data);
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

        $route = $this->routesModel->find($id);

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($route->name, $this->uri, true);

        $data = [
            'route'      => $route,
            'breadcrumbs' => $this->breadcrumbs,
            'errors'      => $session->getFlashdata('errors') ? $session->getFlashdata('errors') : [],
            'action'      => $this->uri.'/update/'.$id,
        ];
        return view('Examples\Routes\Views\edit', $data);
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

            $route = $this->routesModel->find($id);
            $route->fill( $this->request->getPost() );

            if ( $route->hasChanged() ) {

                if ( $this->routesModel->update($id, $route) === false ) {

                    return redirect()->back()->with('errors', $this->routesModel->errors())->withInput();

                }
            }

            return $this->response->redirect( base_url('route/' . $id) );
        }

        return $this->edit($id);
    }

    /**
     * Shows a new empty entity
     *
     * GET  routes/new new()
     * 
     * @return     string  ( rendered view )
     */
    public function new(): string
    {

        $session = session();

        $route = new $this->routesModel->returnType;

        $this->addBreadcrumb('Routes', $this->uri);
        $this->addBreadcrumb('New', $this->uri, true);

        $data = [
            'route'      => $route,
            'breadcrumbs' => $this->breadcrumbs,
            'errors'      => $session->getFlashdata('errors') ? $session->getFlashdata('errors') : [],
            'action'      => $this->uri.'/create',
        ];

        return view('Examples\Routes\Views\new', $data);

    }

    /**
     * Creates a new entity with posted data
     * 
     * POST routes/create create()
     *
     * @return     string  ( description_of_the_return_value )
     */
    public function create(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if ( $this->request->getMethod() === 'post' ) {

            $route = new $this->routesModel->returnType;
            $route->fill( $this->request->getPost() );

            if ( $this->routesModel->insert($route, false) === false ) {

                d($this->routesModel->errors());
                return redirect()->back()->with('errors', $this->routesModel->errors())->withInput();

            }

            $id = $this->routesModel->getInsertID();

            return redirect()->to( base_url( $this->uri . '/' . $id) );
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
    public function delete(string $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $route = $this->routesModel->find($id);


        if ( $this->request->getMethod() === 'post' ) {

            if ( $this->routesModel->delete($id) === false ) {

                d($this->routesModel->errors());
                return redirect()->back()->with('errors', $this->routesModel->errors())->withInput();

            }

            return redirect()->to( base_url( $this->uri ) );
        }

        $this->addBreadcrumb('Companies', $this->uri);
        $this->addBreadcrumb($route->name, $this->uri, true);

        $data = [
            'route'     => $route,
            'breadcrumbs' => $this->breadcrumbs,
            'action'      => $this->uri.'/delete/'.$id,
        ];

        return view("Examples\Routes\Views\delete", $data);
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

        return view('Examples\Routes\Views\form', $data);
    }

    private function addBreadcrumb(?string $text = '', ?string $href = '', bool $isactive = false)
    {
        $breadcrumb = new \stdClass();
        $breadcrumb->text   = $text;
        $breadcrumb->href   = $href;
        $breadcrumb->isactive = $isactive;
        $this->breadcrumbs[] = $breadcrumb;
    }

}