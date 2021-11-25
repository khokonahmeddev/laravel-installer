<?php

namespace Khokon\Installer\Controllers;

use Illuminate\Routing\Controller;
use Khokon\Installer\Services\UserSetupService;

class UserSetupController extends Controller
{
    protected UserSetupService $service;

    public function __construct(UserSetupService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('installer.user-information');
    }

    public function store(): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service
                ->store()
                ->finish();

            return redirect()->route('login')->with('success', 'User created successfully.');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'User information wrong');
        }


    }
}
