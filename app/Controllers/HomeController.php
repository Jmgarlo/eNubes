<?php

namespace App\Controllers;
use App\Models\HabitacionModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $habitacionModel = new HabitacionModel();
        $habitaciones = $habitacionModel->findAll();
        
        return view('main/main');
    }
}
