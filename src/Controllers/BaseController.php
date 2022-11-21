<?php


namespace Freedom\App\Controllers;


use Freedom\Modules\Http\Controller;
use Freedom\Modules\Render\Layout;
use Freedom\Modules\Render\Render;

class BaseController extends Controller
{
    public function index(): Render
    {
        $renderer = Layout::view('main', [
            'page' => 'pages.landing',
        ], ['title' => 'Freedom App']);

        $renderer->addCss('head', 'css.landing');
        return $renderer;
    }

    public function showAll()
    {
        return 'All';
    }

    public function showOne()
    {
        return 'One';
    }
}
