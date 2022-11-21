<?php

use Freedom\App\Controllers\BaseController;
use Freedom\Modules\Http\Router\Router;
use Freedom\Modules\Render\Layout;

Router::get('/', ['controller' => BaseController::class, 'method' => 'index']);
Router::get('/news', ['controller' => BaseController::class, 'method' => 'showAll']);
Router::get('/news/{id}', ['controller' => BaseController::class, 'method' => 'showOne']);

// Api Documentation
Router::get('/api-docs', [\Freedom\App\Controllers\ApiDocsController::class, 'index']);
Router::get('/api-docs/mvc/{page?}', [\Freedom\App\Controllers\ApiDocsController::class, 'mvc']);

Router::fallback(function () {
    return Layout::view('main', [
        'page' => 'pages.404',
    ]);
});

