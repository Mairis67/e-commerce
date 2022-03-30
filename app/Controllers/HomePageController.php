<?php

namespace App\Controllers;

use App\View;

class HomePageController
{
    public function index(): View
    {
        return new View('index');
    }
}