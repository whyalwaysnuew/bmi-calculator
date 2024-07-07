<?php

namespace App\Controllers;

use App\Models\ActivityLevel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ActivityLevelController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->level = new ActivityLevel;
    }

    public function index()
    {
        $levels = $this->level->getData();

        $data = [
            'title' => 'Activity Level',
            'menu' => 'activity-level',
            'ajax' => 'activity-level',
            'levels' => $levels,
        ];

        return view('activity-level/data', $data);
    }

    public function create()
    {
        return view('activity-level/create-modal');
    }

    public function store()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'scale' => $this->request->getPost('scale')
        ];

        try {
            $this->level->createData($data);
            $result = [
                'response' => 200,
                'message' => 'Data Successfully Submitted'
            ];
        } catch (\Exception $e) {
            $result = [
                'response' => 500,
                'message' => $e->getMessage()
            ];
        }

        echo json_encode($result);
    }

    public function edit()
    {
        $id = $this->request->getGet('id');

        $level = $this->level->getDetail($id);

        return view('activity-level/edit-modal', [
            'level' => $level
        ]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('name'),
            'scale' => $this->request->getPost('scale')
        ];

        try {
            $this->level->updateData($data, $id);
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
            $this->level->deleteData($id);
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
