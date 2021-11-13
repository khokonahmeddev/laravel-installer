<?php

namespace Khokon\Installer\Controllers;

use Illuminate\Routing\Controller;
use Khokon\Installer\Helpers\RequirementsHelper;

class InstallerController extends Controller
{
    protected RequirementsHelper $requirements;

    public function __construct(RequirementsHelper $requirements)
    {
        $this->requirements = $requirements;
    }

    public function index()
    {
        $checkPhpVersion = $this->requirements->checkPHPVersion(
            config('installer.core.minPhpVersion')
        );

        $requirements = $this->requirements->checkRequirement(
            config('installer.requirements')
        );

        return view('installer.index', compact('checkPhpVersion', 'requirements'));
    }
}
