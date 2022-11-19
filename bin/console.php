<?php

spl_autoload_register(function ($className) {
    $module_command = '\Command\\';
    $module_db = '\DB\\';
    $module_dotenv = '\Dotenv\\';
    $module_config = '\Config\\';
    $module_storage = '\Storage\\';
    $module_arrays = '\Helpers\Arrays\\';

    $file = null;
    if (stristr($className, $module_command)) {
        $file = stristr($className, $module_command);
    } elseif (stristr($className, $module_db)) {
        $file = stristr($className, $module_db);
    } elseif (stristr($className, $module_dotenv)) {
        $file = stristr($className, $module_dotenv);
    } elseif (stristr($className, $module_config)) {
        $file = stristr($className, $module_config);
    } elseif (stristr($className, $module_storage)) {
        $file = stristr($className, $module_storage);
    } elseif (stristr($className, $module_arrays)) {
        $file = stristr($className, $module_arrays);
    }

    if (!is_null($file)) {
        require 'vendor/winter666/freedom/src/Modules/' . $file . '.php';
    }

    require_once 'vendor/winter666/freedom/helpers/functions.php';
});

require_once 'src/Console/Kernel.php';

use Freedom\Modules\Storage\Session;
use Freedom\App\Console\Kernel;

$diff = strlen(__DIR__) - strlen(stristr(__DIR__, 'bin'));
$path = substr(__DIR__, 0, $diff);
Session::i()->set('project_path', $path);

if (!isset($_SERVER['argv'][1])) {
    echo '[ERROR]: Command name is required, Signature php console.php <name>';
    return 1;
}

$name = $_SERVER['argv'][1];

$commandRegister = new Kernel();
$commandRegister->boot();
$registered = $commandRegister->getRegistered();

$class = $registered[$name];
if (preg_match('/Freedom/', $class)) {
    $path = 'vendor/winter666/freedom/src/Modules/Command/' . stristr($class, 'Defaults');
} else {
    $path = 'src/' . stristr($class, 'Console');
}

require_once preg_replace('/[\\\]/', '/', $path) . '.php';

$object = new $class();

$object->handle();

Session::i()->destroy();
return 0;
