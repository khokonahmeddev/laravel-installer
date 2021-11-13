<?php

namespace Khokon\Installer\Controllers;

use Illuminate\Routing\Controller;
use Khokon\Installer\Helpers\PermissionHelper;

class PermissionController extends Controller
{
    protected PermissionHelper $permission;

    public function __construct(PermissionHelper $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->check(
            config('installer.permissions')
        );
        return view('installer.folder-permission', compact('permissions'));
    }
}
