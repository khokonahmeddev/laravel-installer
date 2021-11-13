<?php

namespace Khokon\Installer\Helpers;

class RequirementsHelper
{
    protected bool $status = false;

    public function checkPHPVersion(string $minPhpVersion): array
    {
        $currentPhpServerVersion = $this->currentPhpServerVersion();

        if (version_compare($currentPhpServerVersion['version'], $minPhpVersion) >= 0) {
            $this->status = true;
        }
        return [
            'current_version' => $currentPhpServerVersion['version'],
            'minimum_version' => $minPhpVersion,
            'status' => $this->status
        ];
    }

    public function checkRequirement(array $requirements): array
    {
        $results = [];

        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                // check php requirements
                case 'php':
                    foreach ($requirements[$type] as $requirement) {

                        $results['requirements'][$type][$requirement] = true;

                        if (!extension_loaded($requirement)) {
                            $results['requirements'][$type][$requirement] = false;

                            $results['errors'] = true;
                        }
                    }
                    break;
                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $requirement) {
                        // if function doesn't exist we can't check apache modules
                        if (function_exists('apache_get_modules')) {
                            $results['requirements'][$type][$requirement] = true;

                            if (!in_array($requirement, apache_get_modules())) {
                                $results['requirements'][$type][$requirement] = false;

                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    protected function currentPhpServerVersion(): array
    {
        $currentFullVersion = PHP_VERSION;

        return [
            'version' => $currentFullVersion
        ];
    }
}
