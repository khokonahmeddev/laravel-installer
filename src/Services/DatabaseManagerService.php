<?php

namespace Khokon\Installer\Services;

use Khokon\Installer\Helpers\DatabaseManagerHelper;
use Khokon\Installer\Helpers\StorageHelper;

class DatabaseManagerService extends InstallerBaseService
{
    protected DatabaseManagerHelper $databaseManager;

    protected StorageHelper $storageManager;

    public function __construct(DatabaseManagerHelper $databaseManager, StorageHelper $storageHelper)
    {
        $this->databaseManager = $databaseManager;
        $this->storageManager = $storageHelper;
    }

    public function setDatabaseConnection(): self
    {
        $this->databaseManager->setDatabaseConfig();

        return $this;
    }

    public function saveFileWizard(): self
    {
        $this->databaseManager->saveFileWizard(request());

        return $this;
    }

    public function setMigration(): self
    {
        $this->databaseManager->migration();

        return $this;
    }

    public function setDatabaseSeeder(): self
    {
        $this->databaseManager->seed();

        return $this;
    }

    public function saveUserInformation(): self
    {

        return $this;
    }

    public function storageLink(): self
    {
        $this->storageManager->link();

        return $this;
    }
}
