<?php

namespace Khokon\Installer\Services;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Khokon\Installer\Helpers\DatabaseManagerHelper;

class UserSetupService extends InstallerBaseService
{
    protected DatabaseManagerHelper $databaseManager;

    public function __construct(DatabaseManagerHelper $helper)
    {
        $this->databaseManager = $helper;
    }

    public function store(): self
    {
        $user = User::query();
        if ($user->count() > 0) {
            $user = $user->first();
            $user->update([
                'name' => request()->get('name'),
                'email' => request()->get('email'),
                'password' => Hash::make(request()->get('password'))
            ]);

        } else {
            User::create([
                'name' => request()->get('name'),
                'email' => request()->get('email'),
                'password' => Hash::make(request()->get('password'))
            ]);
        }
        return $this;
    }

    public function finish(): self
    {
        $this->databaseManager->setEnvironmentValue('APP_INSTALLED', 'true');
        Artisan::call('optimize:clear');

        return $this;
    }
}
