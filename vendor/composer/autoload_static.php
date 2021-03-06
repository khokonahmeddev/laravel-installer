<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita2ac0a48aa524b731cedc1cc47512205
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Obak\\Installer\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Obak\\Installer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita2ac0a48aa524b731cedc1cc47512205::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita2ac0a48aa524b731cedc1cc47512205::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita2ac0a48aa524b731cedc1cc47512205::$classMap;

        }, null, ClassLoader::class);
    }
}
