<?php

namespace App\Controllers;

use App\Models\DailyConsumption;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DailyConsumptionController extends BaseController
{
    public function __construct(Type $var = null) {
        $this->consumption = new DailyConsumption;
    }

    public function index()
    {
        $mains = $this->consumption->getList('1');
        $vegetables = $this->consumption->getList('2');
        $dishes = $this->consumption->getList('3');
        $drinks = $this->consumption->getList('4');
        $snacks = $this->consumption->getList('5');
        $fruits = $this->consumption->getList('6');

        $data = [
            'title' => 'Calorie Consumption',
            'menu' => 'calorie-consumption',
            'ajax' => 'daily-consumption',
            'mains' => $mains,
            'vegetables' => $vegetables,
            'dishes' => $dishes,
            'drinks' => $drinks,
            'snacks' => $snacks,
            'fruits' => $fruits,
        ];

        return view('daily-consumption/index', $data);
    }

    public function calculate()
    {
        $result = [
            'response' => 200,
            'view' => view('daily-consumption/card-result'),
            'message' => 'Data successfully calculated'
        ];

        return $this->response->setJSON($result);
    }
}
