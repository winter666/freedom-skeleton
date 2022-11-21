<?php

use Freedom\Modules\Dotenv\Env;
use Freedom\Providers\DatabaseProvider;
use Freedom\Providers\RouteProvider;

$app = app();

$app->singleton('env', new Env());

$app->register(DatabaseProvider::class);
$app->register(RouteProvider::class);
