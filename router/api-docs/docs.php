<?php
use Freedom\Modules\Http\Router\Router;

Router::get('/api-docs', [\Freedom\App\Controllers\ApiDocsController::class, 'index']);
Router::get('/api-docs/mvc/{page?}', [\Freedom\App\Controllers\ApiDocsController::class, 'mvc']);
