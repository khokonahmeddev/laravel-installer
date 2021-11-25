<?php

namespace Khokon\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EnvironmentController extends Controller
{
    public function index(Request $request)
    {

        return view('installer.environment');
    }

}
