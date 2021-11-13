<?php

namespace Khokon\Installer\Helpers;

use Illuminate\Support\Facades\Artisan;

class StorageHelper
{

    public function link(): bool
    {
        Artisan::call('storage:link');

        return true;
    }
}
