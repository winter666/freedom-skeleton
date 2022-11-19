<?php
require_once 'vendor/autoload.php';
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
$object = new $class();

$object->handle();

Session::i()->destroy();
return 0;

