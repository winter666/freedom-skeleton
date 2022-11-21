<?php

use Freedom\App\Controllers\BaseController;
use Freedom\Modules\Http\Router\Router;
use Freedom\Modules\Render\Layout;

Router::get('/', ['controller' => BaseController::class, 'method' => 'index']);
Router::get('/news', ['controller' => BaseController::class, 'method' => 'showAll']);
Router::get('/news/{id}', ['controller' => BaseController::class, 'method' => 'showOne']);

// Api Documentation
Router::get('/api-docs', function () {
    $render = Layout::view('main',
        ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.main'],
        ['title' => 'API Documentation']
    );
    $render->addCss('head', 'css.docs');
    return $render;
});

Router::get('/api-docs/mvc', function () {
    $render = Layout::view('main',
        ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.mvc.index'],
        ['title' => 'MVC Concepts'],
    );
    $render->addCss('head', 'css.docs');
    return $render;
});

Router::get('/api-docs/mvc/router', function () {
    $render = Layout::view('main',
        ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.mvc.router'],
        ['title' => 'Router'],
    );
    $render->addCss('head', 'css.docs');
    return $render;
});

Router::get('/api-docs/mvc/controller', function () {
    $render = Layout::view('main',
        ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.mvc.controller'],
        ['title' => 'Controller'],
    );
    $render->addCss('head', 'css.docs');
    return $render;
});

Router::fallback(function () {
    return Layout::view('main', [
        'page' => 'pages.404',
    ]);
});

