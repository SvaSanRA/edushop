<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7763ad394e674867bd4c70c698210ad5
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7763ad394e674867bd4c70c698210ad5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7763ad394e674867bd4c70c698210ad5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7763ad394e674867bd4c70c698210ad5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
