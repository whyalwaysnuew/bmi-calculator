<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'ajax' => 'dashboard',
            'menu' => 'dashboard'
        ];

        return view('home/dashboard', $data);
    }
}
