<?php

use Freedom\App\Controllers\BaseController;
use Freedom\Modules\Http\Router\Router;

Router::init();

Router::get('/', ['controller' => BaseController::class, 'method' => 'index']);

