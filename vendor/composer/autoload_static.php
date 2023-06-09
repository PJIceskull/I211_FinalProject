<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08d430758f7c032e073dc3e46879e31f
{
    public static $classMap = array (
        'ComposerAutoloaderInit08d430758f7c032e073dc3e46879e31f' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit08d430758f7c032e073dc3e46879e31f' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DataLengthException' => __DIR__ . '/../..' . '/exceptions/data_length_exception.class.php',
        'DataMissingException' => __DIR__ . '/../..' . '/exceptions/data_missing_exception.class.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'DatabaseException' => __DIR__ . '/../..' . '/exceptions/database_exception.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'EmailFormatException' => __DIR__ . '/../..' . '/exceptions/email_format_exception.class.php',
        'Home' => __DIR__ . '/../..' . '/views/home/home_index.class.php',
        'Index' => __DIR__ . '/../..' . '/views/user/index/index.class.php',
        'Login' => __DIR__ . '/../..' . '/views/user/login/login.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'Photo' => __DIR__ . '/../..' . '/models/photogallery.class.php',
        'PhotoController' => __DIR__ . '/../..' . '/controllers/photogallery_controller.class.php',
        'PhotoDetail' => __DIR__ . '/../..' . '/views/photo/detail/photodetail.class.php',
        'PhotoEdit' => __DIR__ . '/../..' . '/views/photo/edit/photo_edit.class.php',
        'PhotoError' => __DIR__ . '/../..' . '/views/photo/error/photoerror.class.php',
        'PhotoIndex' => __DIR__ . '/../..' . '/views/photo/index/photoindex.class.php',
        'PhotoModel' => __DIR__ . '/../..' . '/models/photogallery_model.class.php',
        'PhotoSearch' => __DIR__ . '/../..' . '/views/photo/search/photo_search.class.php',
        'PhotoView' => __DIR__ . '/../..' . '/views/photogallery_view.class.php',
        'Register' => __DIR__ . '/../..' . '/views/user/index/register.class.php',
        'Reset' => __DIR__ . '/../..' . '/views/user/reset/reset.class.php',
        'ResetConfirm' => __DIR__ . '/../..' . '/views/user/reset/reset_confirm.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'Utilities' => __DIR__ . '/../..' . '/application/utilities.class.php',
        'Verify' => __DIR__ . '/../..' . '/views/user/login/verify.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit08d430758f7c032e073dc3e46879e31f::$classMap;

        }, null, ClassLoader::class);
    }
}
