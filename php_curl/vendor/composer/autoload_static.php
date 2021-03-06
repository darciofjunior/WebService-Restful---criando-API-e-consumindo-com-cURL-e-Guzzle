<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06da4f88a81be2f83e3267fe79d2705f
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'ETI\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ETI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/eti',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06da4f88a81be2f83e3267fe79d2705f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06da4f88a81be2f83e3267fe79d2705f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
