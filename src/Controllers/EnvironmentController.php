<?php

namespace Khokon\Installer\Controllers;

use Illuminate\Routing\Controller;

class EnvironmentController extends Controller
{
    public function index()
    {
        return view('installer.environment');
    }

}
