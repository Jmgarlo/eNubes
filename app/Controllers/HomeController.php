<?php

namespace App\Controllers;
use App\Models\HabitacionModel;

class HomeController extends BaseController
{
    public function index(): string
    {

        return view('main/main');
    }
}
