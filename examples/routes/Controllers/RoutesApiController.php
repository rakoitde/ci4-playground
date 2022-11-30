<?php

namespace Examples\Routes\Controllers;

use CodeIgniter\RESTful\ResourceController;


// Method      Route           Description
// =========================================================
// GET         /test           Get all entities
// GET         /test/:id       Get a single entity
// GET         /test/:id/edit  Get a an editable single entity
// GET         /test/new       Get a new single entity
// POST        /test           Create a entity
// PUT/PATCH   /test/:id       Update a entity
// DELETE      /test/:id       Delete a entity
// 
// $routes->get(   'api/test',             'TestApiController::index');
// $routes->get(   'api/test/(:num)',      'TestApiController::show/$1');
// $routes->get(   'api/test/(:num)/edit', 'TestApiController::edit/$1');
// $routes->get(   'api/test/new',         'TestApiController::new');
// $routes->post(  'api/test',             'TestApiController::create');
// $routes->put(   'api/test/(:num)',      'TestApiController::update/$1');  // Update or Insert all attributes => upsert/$1
// $routes->patch( 'api/test/(:num)',      'TestApiController::update/$1');  // Update changed attributes
// $routes->delete('api/test/(:num)',      'TestApiController::delete/$1');

class RoutesApiController extends ResourceController
{

    /**
     * holds the request GET vars
     */
    private array $query;

    /**
     * holds the special request vars like _order _limit and _filter
     */
    private array $query_data;

    /**
     * holts the limit
     */
    private int $limit = 0;

    /**
     * Constructs a new instance
     * and sets the model name
     */
    public function __construct() {
        $this->modelName = 'Examples\Routes\Models\RoutesModel';
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     * 
     * @example    GET /test                               Returns all entities
     * @example    GET /test?_order[firstname]=asc         Order result asc by firstname
     * @example    GET /test?_limit=5                      Limit the result to 5
     * @example    GET /test?surname=schmidt&firstname=tom Filter the result by fieldname array
     */
    public function index()
    {
        $this->query     = $this->request->getGet();

        $this->_order();
        $this->_limit();

        $this->model->orLike('vorname', $this->request->getGet('search'), 'both');
        $this->model->orLike('nachname', $this->request->getGet('search'), 'both');

        $this->_likeFilter();

        $cols = [
            [
                "head" => "#",
                "field" => "{id}"         
            ],
            [
                "head" => "Name",
                "field" => "{nachname}, {vorname}"           
            ]
        ];

        $data['cols']       = $cols;
        $data['select']     = $this->model->builder ? $this->model->builder->getCompiledSelect(false) : [];
        $data['entities']   = $this->model->findAll($this->limit);
        $data['result']     = $data['entities'];
        $data['query']      = $this->query_data ?? [];

        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     * 
     * @example    GET /test/2       Returns entity with id 2
     * @example    GET /test/999999  Returns 404 failNotFound
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);

        return $data ? $this->respond($data) : $this->failNotFound('Entity with ID: '.$id.' cannot be found.');
    }

    /**
     * Return a new resource object, with default properties
     * the $attributes in entity musst be set
     *
     * @return mixed
     * 
     * @example    GET /test/new       Returns new, prefilled entity
     */
    public function new()
    {
        $data = new \App\Entities\TestEntity();
        return $this->respond($data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed     201 (Created), 'Location' header with link to {current_url}/{id} containing new ID
     * 
     * @example    POST /test       Creates an entity with post data
     */
    public function create()
    {
        $data = $this->request->getJson();

        $model = $this->model;

        try {
            $result = $model->insert($data);

            if (isset($result) && $result>0) {
                $location = current_url(false).'/'.strval($result);
                $this->response->setHeader('Location', $location);
                return $this->respondCreated([$data, $model, $result, current_url(false)], 'Custom Create Message');
            }
        } catch (\mysqli_sql_exception $e) {
            return $this->failResourceExists($e->getMessage(), 409, $e->getMessage());
        } catch (\RuntimeException $e) {
            return $this->fail( $e->getMessage() );
        }


        return $this->failValidationErrors($validation->getErrors(), 400, 'Did not pass the Validation');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     * 
     * @example    GET /test/2/edit  Returns entity with id 2
     * @example    GET /test/999999/edit  Returns 404 failNotFound
     */
    public function edit($id = null)
    {
        $allowedFields   = $this->model->allowedFields;
        $allowedFields[] = $this->model->primaryKey;

        $data = $this->model->select($allowedFields)->find($id);

        return $data ? $this->respond($data) : $this->failNotFound('Entity with ID: '.$id.' cannot be found.');
    }

    /**
     * Add or update a model resource, from "posted" properties
     * All attributes will updated
     *
     * @return mixed
     * 
     * @example    PUT /api/0.1/routes/:id  Update or Insert all attributes
     */
    public function upsert($id = null)
    {

        $data = $this->request->getJson();

        $model = $this->model;

        try {
            $result = $model->save($data);

            if (isset($result) && $result>0) {
                $location = current_url(false).'/'.strval($result);
                $this->response->setHeader('Location', $location);
                return $this->respondCreated([$data, $model, $result, current_url(false)], 'Custom Create Message');
            }
        } catch (\mysqli_sql_exception $e) {
            return $this->failResourceExists($e->getMessage(), 409, $e->getMessage());
        } catch (\RuntimeException $e) {
            return $this->fail( $e->getMessage() );
        }


        return $this->failValidationErrors($validation->getErrors(), 400, 'Did not pass the Validation');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        return $this->respond($this->request->getJson(), 200, 'Custom Updated Message');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        return $this->respondDeleted(['id' => $id], "Custom Delete Message");
    }


    /**
     * helper function to set model orderby by query key _order and unset $this->query with key _order
     */
    private function _order() {

        if (isset($this->query['_order'])) { 
            foreach ($this->query['_order'] as $key => $direction) {
                if (!in_array($direction, ['asc','desc'])) { continue; }
                $this->model->orderBy($key, $direction);
                $this->query_data['_order'][$key] = $this->query['_order'][$key];
            }
            unset($this->query['_order']);
        }
    }

    /**
     * helper function to set model limit by query key _limit
     */
    private function _limit() {
        if (isset($this->query['_limit'])) { 
            $this->limit = $this->query['_limit'];
            $this->query_data['_limit'] = $this->query['_limit'];
            unset($this->query['_limit']);
        }
    }

    /**
     * helper function to set model filter with like
     */
    private function _likeFilter() {
        if ($this->query && is_array($this->query) && count($this->query)>0) {
            $allowedFields = $this->model->allowedFields;
            foreach ($this->query as $key => $query) {
                if (in_array($key, $allowedFields)) {
                    $this->model->orLike($query); 
                }
            }
            $this->query_data['_filter'] = $this->query;
        }
    }



}
