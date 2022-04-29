<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BerandaModel; 


class Beranda extends ResourceController
{
    public function __construct() {
        $this->berandaModel = new BerandaModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $berandas = $this->berandaModel->findAll();

        $payload = [
            "berandas" => $berandas
        ];

        echo view('beranda/index', $payload);
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
        $payload = [
            "name" => $this->request->getPost('name'),
            "status" => $this->request->getPost('status'),
        ];


        $this->berandaModel->insert($payload);
        return redirect()->to('/beranda');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $beranda = $this->berandaModel->find($id);
        
        if (!$beranda) {
            throw new \Exception("Data not found!");   
        }
        
        echo view('beranda/edit', ["data" => $beranda]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $payload = [
            "name" => $this->request->getPost('name'),
            "status" => $this->request->getPost('status'),
        ];

        $this->berandaModel->update($id, $payload);
        return redirect()->to('/beranda');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->berandaModel->delete($id);
        return redirect()->to('/beranda');
    }
}
