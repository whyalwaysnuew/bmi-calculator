<?php

namespace App\Controllers;

use App\Models\Consumption;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ConsumptionController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->consumption = new Consumption;
    }

    public function index()
    {
        $consumptions = $this->consumption->getData();

        $data = [
            'title' => 'Consumption',
            'menu' => 'consumption',
            'ajax' => 'consumption',
            'consumptions' => $consumptions
        ];

        return view('consumption/data', $data);
    }

    public function create()
    {
        return view('consumption/create-modal');
    }

    public function store()
    {
        $post = $this->request->getPost();

        $data = [
            'name' => $post['name'],
            'type' => $post['type'],
            'energy' => $post['energy']
        ];

        try {
            $this->consumption->createData($data);
            $result = [
                'response' => 200,
                'message' => 'Data Successfully Submitted'
            ];
        } catch (Exception $e) {
            $result = [
                'response' => 500,
                'message' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($result);
    }

    public function edit()
    {
        $id = $this->request->getGet('id');
        $consumption = $this->consumption->getDetail($id);

        return view('consumption/edit-modal', [
            'id' => $id,
            'consumption' => $consumption
        ]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'energy' => $this->request->getPost('energy')
        ];

        try {
            $this->consumption->updateData($data, $id);
            $result = [
                'response' => 200,
                'message' => 'Data Successfully Updated'
            ];
        } catch (Exception $e) {
            $result = [
                'response' => 500,
                'message' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($result);
    }

    public function delete()
    {
        $id = $this->request->getGet('id');

        try {
            $this->consumption->deleteData($id);
            $result = [
                'response' => 200,
                'message' => 'Data Successfully Deleted'
            ];
        } catch (Exception $e) {
            $result = [
                'response' => 500,
                'message' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($result);
    }
}
