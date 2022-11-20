<?php

use Freedom\Modules\Application;
use Freedom\Modules\Dotenv\Env;
use Freedom\Providers\DatabaseProvider;
use Freedom\Providers\RouteProvider;

$app = new Application();

$app->singleton('env', new Env());

$app->register(DatabaseProvider::class);
$app->register(RouteProvider::class);
