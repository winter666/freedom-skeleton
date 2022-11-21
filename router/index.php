<?php

use Freedom\App\Controllers\BaseController;
use Freedom\Modules\Http\Router\Router;

Router::get('/', ['controller' => BaseController::class, 'method' => 'index']);
Router::get('/news', ['controller' => BaseController::class, 'method' => 'showAll']);
Router::get('/news/{id}', ['controller' => BaseController::class, 'method' => 'showOne']);

Router::fallback(function () {
    return \Freedom\Modules\Render\Layout::view('main', [ 'page' => 'pages.404' ], [ 'title' => 'Page was not found' ]);
});

