<?php

namespace Khokon\Installer\Controllers;


use Illuminate\Routing\Controller;
use Khokon\Installer\Controllers\Requests\DatabaseManagerRequest;
use Khokon\Installer\Services\DatabaseManagerService;


class DatabaseManagerController extends Controller
{
    protected DatabaseManagerService $service;

    public function __construct(DatabaseManagerService $service)
    {
        $this->service = $service;
    }

    public function setConnect(DatabaseManagerRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (!$this->service->setDatabaseConfig()) {
            return redirect()->back()->with('error', 'Database connection wrong');
        }
        $this->service
            ->clearCaches()
            ->setDatabaseConnection()
            ->saveFileWizard()
            ->setMigration()
            ->setDatabaseSeeder()
            ->storageLink();

        return redirect()->route('user.information')->with('success', 'Database connection successfully.');

    }
}
