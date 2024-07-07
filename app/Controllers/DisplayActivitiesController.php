<?php

namespace App\Controllers;

use App\Models\DisplayActivities;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DisplayActivitiesController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->display = new DisplayActivities;
    }

    public function index()
    {
        $activities = $this->display->getData();

        $data = [
            'title' => 'Physical Activities',
            'menu' => 'dashboard',
            'ajax' => 'display-activities',
            'activities' => $activities
        ];

        return view('display-activity/index', $data);
    }
}
