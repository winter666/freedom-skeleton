<?php

use Freedom\App\Controllers\BaseController;
use Freedom\Modules\Http\Router\Router;
use Freedom\Modules\Render\Layout;

Router::get('/', ['controller' => BaseController::class, 'method' => 'index']);
Router::get('/news', ['controller' => BaseController::class, 'method' => 'showAll']);
Router::get('/news/{id}', ['controller' => BaseController::class, 'method' => 'showOne']);

// Api Documentation
require 'api-docs/docs.php';

Router::fallback(function () {
    return Layout::view('main', [
        'page' => 'pages.404',
    ]);
});

