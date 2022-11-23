<?php


namespace Freedom\App\Controllers;


use Freedom\App\Services\ApiDocsStorage;
use Freedom\Modules\Http\Controller;
use Freedom\Modules\Http\Request;
use Freedom\Modules\Render\Layout;

class ApiDocsController extends Controller
{
    public function index()
    {
        $render = Layout::view('main',
            ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.main'],
            ['title' => 'API Documentation']
        );
        $render->addCss('head', 'css.docs');
        return $render;
    }

    public function mvc(ApiDocsStorage $apiDocsStorage, Request $request)
    {
        $page = $request->get('page');
        $data = $apiDocsStorage->getByPage($page);

        if (empty($data)) {
            return Layout::view('main', [
                'page' => 'pages.404',
            ]);
        }

        $render = Layout::view('main',
            ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.mvc.index'],
            $data,
        );

        $render->addCss('head', 'css.docs');
        return $render;
    }
}
