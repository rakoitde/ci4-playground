<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class FolderApiController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = $this->request->getGet('id');

        $folderModel = model('FolderModel');
        $folder = $folderModel
            ->select('folder.*, count(f2.id) as has_child')
            ->join('folder f2', 'folder.id=f2.parent_id', 'left')
            ->groupBy('folder.id')
            ->where('folder.parent_id', $id)
            ->findAll();

        return $this->respond($folder);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
