<?php

namespace App\Controllers;

use App\Models\PhysicalActivity;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PhysicalActivityController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->activity = new PhysicalActivity;
    }

    public function index()
    {
        $activities = $this->activity->getData();

        $data = [
            'title' => 'Physical Activity',
            'menu' => 'activity',
            'ajax' => 'physical-activity',
            'activities' => $activities
        ];

        return view('physical-activity/data', $data);
    }

    public function create()
    {
        return view('physical-activity/create-modal');
    }

    public function store()
    {
        $post = $this->request->getPost();

        $data = [
            'name' => $post['name'],
            'description' => $post['description'],
            'calorie' => $post['calorie'],
        ];

        try {
            $this->activity->createData($data);
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
        $activity = $this->activity->getDetail($id);

        return view('physical-activity/edit-modal', [
            'id' => $id,
            'activity' => $activity
        ]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'calorie' => $this->request->getPost('calorie'),
        ];

        try {
            $this->activity->updateData($data, $id);
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
            $this->activity->deleteData($id);
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
