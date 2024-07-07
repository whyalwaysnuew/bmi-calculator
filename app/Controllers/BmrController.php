<?php

namespace App\Controllers;

use App\Models\BMR;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BmrController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->bmr = new BMR;
    }

    public function index()
    {   
        $levels = $this->bmr->getActivityLevels();

        $data = [
            'title' => 'Basal Metabolic Rate',
            'ajax' => 'bmr',
            'menu' => 'bmr',
            'levels' => @$levels
        ];

        return view('bmr/index', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $weight = $data['weight'];
        $height = $data['height'];
        $age = $data['age'];
        $gender = $data['gender'];
        $scale = $data['scale'];
        $ideal_weight = $height - 100;

        $result = [
            'response' => 200,
            'view' => view('bmr/card-result', [
                'weight' => @$weight,
                'height' => @$height,
                'age' => @$age,
                'gender' => @$gender,
                'scale' => @$scale,
                'ideal_weight' => @$ideal_weight
            ]),
            'message' => 'Data successfully submitted'
        ];

        return $this->response->setJSON($result);
    }
}
