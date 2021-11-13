<?php

namespace Khokon\Installer\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Khokon\Installer\Services\DatabaseManagerService;


class DatabaseManagerController extends Controller
{
    protected DatabaseManagerService $service;

    public function __construct(DatabaseManagerService $service)
    {
        $this->service = $service;
    }

    public function setConnect(Request $request)
    {

        $this->service
            ->setDatabaseConnection()
            ->saveFileWizard()
            ->setMigration()
            ->setDatabaseSeeder()
            ->storageLink();

        return redirect()->route('user.information')->with('success', 'Database connection successfully.');

    }
}
