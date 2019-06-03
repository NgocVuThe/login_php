<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32c923411df3fbc3146859286da1fa4a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'App\\Controller\\StudentController' => __DIR__ . '/../..' . '/app/controllers/StudentController.php',
        'App\\Controller\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'App\\Model\\BaseModel' => __DIR__ . '/../..' . '/app/models/BaseModel.php',
        'App\\Model\\Student' => __DIR__ . '/../..' . '/app/models/Student.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/app/models/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit32c923411df3fbc3146859286da1fa4a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit32c923411df3fbc3146859286da1fa4a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit32c923411df3fbc3146859286da1fa4a::$classMap;

        }, null, ClassLoader::class);
    }
}
