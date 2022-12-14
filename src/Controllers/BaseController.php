<?php


namespace Freedom\App\Controllers;


use Freedom\Modules\Render\Layout;
use Freedom\Modules\Render\Render;

class BaseController
{
    public function index(): Render
    {
        $renderer = Layout::view('main', [
            'page' => 'pages.landing',
        ], ['title' => 'Freedom App']);

        $renderer->addCss('head', 'css.landing');
        return $renderer;
    }
}
