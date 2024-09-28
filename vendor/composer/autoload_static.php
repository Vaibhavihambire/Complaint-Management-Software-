<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf5bfb6f3a0c547dda8a6a9a17feafcd7
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kartik\\select2\\' => 15,
            'kartik\\base\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kartik\\select2\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-select2/src',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf5bfb6f3a0c547dda8a6a9a17feafcd7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf5bfb6f3a0c547dda8a6a9a17feafcd7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf5bfb6f3a0c547dda8a6a9a17feafcd7::$classMap;

        }, null, ClassLoader::class);
    }
}
