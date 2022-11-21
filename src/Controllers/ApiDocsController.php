<?php


namespace Freedom\App\Controllers;


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

    public function mvc(Request $request)
    {
        $page = $request->get('page');
        $key = $page === null ? 'index' : $page;
        $pages = [
            'index' => [
                'title' => 'MVC Concepts',
                'menu' => [],
                'content' => '',
                'description' => '<p>This article about basic MVC Concepts. In this articles you\'ll find out how to work with <a href="/api-docs/mvc/router">Router Module</a> and how to handle Requests with <a href="/api-docs/mvc/controller">Controller Module</a></p>',
            ],
            'router' => [
                'title' => 'Router',
                'menu' => [
                    [
                        'name' => 'Syntax',
                        'link' => '#syntax',
                    ],
                    [
                        'name' => 'Handle Requests',
                        'link' => '#handle-requests',
                    ],
                    [
                        'name' => 'Handle 404',
                        'link' => '#handle-404',
                    ],
                ],
                'content' => '<div class="article-part">
        <h3 id="syntax">Syntax</h3>
        <p>
            Syntax for routing similar with Laravel.
        </p>
        <p>
            This is functional use syntax:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">\'/some-url\'</i><i class="internal-brown">, function</i> () { <i class="comment">// Some body</i> })<i class="internal-brown">;</i></i>
            </code>
        </p>
        <p>
            This is Controller use syntax:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">\'/some-url\'</i>, [SomeController::<i class="internal-brown">class,</i> <i class="value-str">\'someMethodName\'</i>])<i class="internal-brown">;</i></i>
            </code>
            In this case, you need to create Controller, and declare in this route, like a SomeController in example.
        </p>
    </div>
    <div class="article-part">
        <h3 id="handle-requests">Handle Requests</h3>
        <p>
            For handle different requests you must use special methods from Route class. This methods have a similar argument signature.
            As the first argument - the url string that comes from the client, and as the second - the way of handle this request.
        </p>
        <h4>GET</h4>
        <p>For handle GET request you must to use special static method from Route class <q>get()</q>.</p>
        <h4>POST</h4>
        <p>For handle POST request you must to use special static method from Route class <q>post()</q>.</p>
    </div>
    <div class="article-part">
        <h3 id="handle-404">Handle 404</h3>
        <p>
            404 Error is a special response from server, it says about that resource what are you looking for - was not found.
            And for handle this error, Router class have special static method - <q>fallback()</q>.
            As the first argument - the way of handle error.
        </p>
        <p>
            Closure-use syntax for this:
            <code>
                <i class="pos">Router::<i class="method-name">fallback</i>(<i class="internal-brown">function</i> () { <i class="comment">// fallback handle</i> })<i class="internal-brown">;</i></i>
            </code>
            It\'s may be a Controller-use handle:
            <code>
                <i class="pos">Router::<i class="method-name">fallback</i>([FallbackController::<i class="internal-brown">class,</i> <i class="value-str">\'handleMethodName\'</i>])<i class="internal-brown">;</i></i>
            </code>
        </p>
    </div>',
                'description' => '<p>Module Router allows you to write convenient human-readable links with various processing methods.</p>',
            ],
            'controller' => [
                'title' => 'Controller',
                'menu' => [
                    [
                        'name' => 'Syntax',
                        'link' => '#syntax',
                    ],
                    [
                        'name' => 'Request',
                        'link' => '#request',
                    ],
                    [
                        'name' => 'Response',
                        'link' => '#response',
                    ],
                ],
                'description' => '<p>Module Controller allows you to handle request from client.</p>',
                'content' => '<div class="article-part">
        <h3 id="syntax">Syntax</h3>
        <p>
            A controller is a class that has methods for handling specific routes.
            Basic usage:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">\'/some-url\'</i>, [SomeController::<i class="internal-brown">class,</i>
                    <i class="value-str">\'someMethod\'</i>])<i
                            class="internal-brown">;</i></i>
            </code>
            And in SomeController:
            <code>
                <i class="pos"><i class="internal-brown">namespace</i> Freedom\App\Controllers<i class="internal-brown">;</i></i>
                &nbsp;
                <i class="pos"><i class="internal-brown">class</i> SomeController {</i>
                &nbsp;
                <i class="pos">
                    <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">someMethod</i>()
                        {</i>
                    <i class="pos">
                        <i class="pos"><i class="comment">// Some realization</i></i>
                    </i>
                    <i class="pos">}</i>
                </i>
                &nbsp;
                <i class="pos">}</i>
            </code>
        </p>
    </div>
    <div class="article-part">
        <h3 id="request">Request</h3>
        <p>
            You can use request from <q>Freedom\Modules\Http\Request</q> argument in your method into Controller. Basic
            usage:
        </p>
        <code>
            <i class="pos"><i class="internal-brown">namespace</i> Freedom\App\Controllers<i
                        class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos"><i class="internal-brown">use</i> Freedom\Modules\Http\Request<i class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos"><i class="internal-brown">class</i> SomeController {</i>
            &nbsp;
            <i class="pos">
                <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">someMethod</i>(Request
                    <i class="var">$request</i>) {</i>
                <i class="pos">
                    <i class="pos"><i class="var">$request</i>-><i class="method-name">get</i>(<i class="value-str">\'some_value_from_client\'</i>)<i
                                class="internal-brown">;</i></i>
                    <i class="pos"><i class="comment">// Some realization</i></i>
                </i>
                <i class="pos">}</i>
            </i>
            &nbsp;
            <i class="pos">}</i>
        </code>
    </div>
    <div class="article-part">
        <h3 id="response">Response</h3>
        <p>
            You can send response for several ways:
        </p>
        <ul>
            <li>As a string (with content-type text/html)</li>
            <li>As a <q>Freedom\Modules\Render\Render</q> template</li>
            <li>As a json response (with content-type application/json) using <q>Freedom\Modules\Http\Response</q></li>
        </ul>
        <code>
            <i class="pos"><i class="internal-brown">namespace</i> Freedom\App\Controllers<i
                        class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos"><i class="internal-brown">use</i> Freedom\Modules\Http\Response<i
                        class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos"><i class="internal-brown">class</i> SomeController {
                &nbsp;
                <i class="pos comment">// As a string</i>
                <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">responseWithStringMethod</i>()
                    {</i>
                <i class="pos">
                    <i class="pos"><i class="internal-brown">return</i> <i class="value-str">\'Hello world!\'</i></i>
                </i>
                <i class="pos">}</i>
                &nbsp;
                <i class="pos comment">// As a Freedom\Modules\Render\Render template</i>
                <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">responseWithLayoutMethod</i>()
                    {</i>
                <i class="pos">
                    <i class="pos"><i class="internal-brown">return</i> <i>Layout::<i class="method-name">view</i>(<i class="value-str">\'layout_name\'</i><i class="internal-brown">,</i> []<i class="internal-brown">,</i> []);</i></i>
                </i>
                <i class="pos">}</i>
                &nbsp;
                <i class="pos comment">// As a json</i>
                <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">responseWithJsonMethod</i>()
                    {</i>
                <i class="pos">
                    <i class="pos"><i class="var">$response</i> = <i class="internal-brown">new</i> Response()<i
                                class="internal-brown">;</i></i>
                    <i class="pos"><i class="internal-brown">return</i> <i class="var">$response</i>-><i
                                class="method-name">sendJson</i>([<i class="value-str">\'value\'</i> => <i
                                class="value-str">\'Hello world!\'</i>])<i class="internal-brown">;</i></i>
                </i>
                <i class="pos">}</i>
                &nbsp;
                <br/>
            }
            </i>
        </code>
    </div>',
            ],
            'templates' => [
                'title' => 'Templates',
                'menu' => [
                    [
                        'name' => 'How to use',
                        'link' => '#how-to-use',
                    ],
                    [
                        'name' => 'Component Approach',
                        'link' => '#component-approach',
                    ],
                    [
                        'name' => 'CSS',
                        'link' => '#css',
                    ],
                    [
                        'name' => 'JS',
                        'link' => '#js',
                    ],
                ],
                'description' => '<p>Module Render allows you create & use templates.</p>',
                'content' => '
<div class="article-part">
    <h3 id="how-to-use">How to use</h3>
    <p>
        At first you need to create your layout folder with entry point <q>index.php</q>. 
        It must be located in <q>/resources/layouts/&lt;your_layout_name&gt;</q>.
        You should check your layout, when you create them:
        <ul>
            <li>Write something in your <q>/resources/layouts/&lt;your_layout_name&gt;/index.php</q></li>
            <li>Declare route, or choose existing</li>
            <li>Your route handler returned value must be a <q>Layout::view(\'&lt;your_layout_name&gt;\', [], [])</q></li>
        </ul>
        As example, we created layout with name - main:
        <code>
            <i class="pos comment">&lt;!-- in resources/layouts/main/index.php --&gt;</i>
            <i class="pos"><i class="method-name">&lt;h1&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$message</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/h1&gt;</i></i>
        </code>
        After we declared route for this page:
        <code>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/\'</i><i class="internal-brown">, function</i>() {
                <i class="pos"><i class="internal-brown">return</i> Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> []<i class="internal-brown">,</i> [ <i class="value-str">\'message\'</i> => <i class="value-str">\'Hello world!\'</i> ])<i class="internal-brown">;</i></i>            
            })<i class="internal-brown">;</i></i>
        </code>
        And when we enter on http://&lt;yourdomain.co&gt;/ - we get this page with message \'Hello world!\'
    </p>               
</div>
<div class="article-part">
    <h3 id="component-approach">Component Approach</h3>
    <p>
        So, every template instance of <q>\Freedom\Modules\Render\Render</q>. You can use <q>renderTemplate(\'component_name\')</q> at any place of your layout.
        If you want to render some template, you should to create it, and specify it, when you return your <q>\Freedom\Modules\Render\Render</q>.
        Let\'s come back to our example. Now we have a two templates - first is a list of items and second is detail page. Layout has general header and footer, but different pages.
        At first we created two templates in example (pages) directory in main <q>resources/layouts/main/pages</q> - it\'s <q>list.php</q> and <q>detail.php</q>, and after we update our layout. Let\'s see it:
        <code>
            <i class="pos comment">&lt;!-- in resources/layouts/main/index.php --&gt;</i>
            <i class="pos">
                <i class="method-name">&lt;header&gt;</i> 
                <i class="pos"><i class="method-name">&lt;h1&gt;</i>Header<i class="method-name">&lt;/h1&gt;</i></i>
                <i class="pos"><i class="method-name">&lt;h2&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$title</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/h2&gt;</i></i>
                <i class="method-name">&lt;/header&gt;</i>
            </i>
            <i class="pos">
                <i class="method-name">&lt;div</i> class=<i class="value-str">"content"</i><i class="method-name">&gt;</i>
                <i class="pos"><i class="internal-brown">&lt;?=</i> <i class="var">$this</i>-><i class="method-name">renderTemplate</i>(<i class="value-str">\'page\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                <i class="method-name">&lt;/div&gt;</i>
            </i>
            <i class="pos">
                <i class="method-name">&lt;footer&gt;</i>
                <i class="pos">&copy; Freedom App</i>
                <i class="method-name">&lt;/footer&gt;</i>
            </i>
        </code>
        So, we created general header & footer, and after we call a <q>renderTemplate()</q> method. As an argument, we use template name. In this example it is <q>page</q>.
        Now we come back in our router:
        <code>
            <i class="pos comment">// This for list</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list\'</i><i class="internal-brown">, function</i>() {
                <i class="pos"><i class="internal-brown">return</i> Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.list\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'List page\'</i> ])<i class="internal-brown">;</i></i>            
            })<i class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos comment">// This for detail</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list/{id}\'</i><i class="internal-brown">, function</i>(Request <i class="var">$request</i>) {
                <i class="pos"><i class="var">$id</i> = <i class="var">$request</i>-><i class="method-name">get</i>(<i class="value-str">\'id\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="internal-brown">return</i> Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.detail\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'Detail page\'</i><i class="internal-brown">,</i> <i class="value-str">\'content\'</i> => <i class="value-str">"Item ID: </i>{<i class="var">$id</i>}<i class="value-str">"</i> ])<i class="internal-brown">;</i></i>            
            })<i class="internal-brown">;</i></i>
        </code>
        So, now we have two pages (/list, /list/{id}) with one common template.
    </p>
</div>
<div class="article-part">
    <h3 id="css">CSS</h3>
    <p>
        You can turn-on your styles on your page. Create your stylesheet in <q>public</q> folder. You should use <q>yieldCss()</q> for make a field to place dynamic style includes.
        For example, we created two stylesheets in <q>public/styles</q> folder - <q>list.css</q> and <q>detail.css</q>.
        As example:
        <code>
            <i class="pos comment">&lt;!-- in resources/layouts/main/index.php --&gt;</i>
            <i class="pos">
                <i class="method-name">&lt;html&gt;</i>
                <i class="pos">
                    <i class="method-name">&lt;head&gt;</i>
                    <i class="pos">
                        <i class="method-name">&lt;title&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$title</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/title&gt;</i>
                    </i>
                    <i class="pos comment">&lt;!-- Yield for styles --&gt;</i>
                    <i class="pos"><i class="internal-brown">&lt;?= </i><i class="var">$this</i>-><i class="method-name">yieldCss</i>(<i class="value-str">\'content\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                    <i class="method-name">&lt;/head&gt;</i>
                </i>
                <i class="pos">
                    <i class="method-name">&lt;body&gt;</i>
                    <i class="pos">
                        <i class="method-name">&lt;header&gt;</i> 
                        <i class="pos"><i class="method-name">&lt;h1&gt;</i>Header<i class="method-name">&lt;/h1&gt;</i></i>
                        <i class="pos"><i class="method-name">&lt;h2&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$title</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/h2&gt;</i></i>
                        <i class="method-name">&lt;/header&gt;</i>
                    </i>
                    <i class="pos">
                        <i class="method-name">&lt;div</i> class=<i class="value-str">"content"</i><i class="method-name">&gt;</i>
                        <i class="pos"><i class="internal-brown">&lt;?=</i> <i class="var">$this</i>-><i class="method-name">renderTemplate</i>(<i class="value-str">\'page\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                        <i class="method-name">&lt;/div&gt;</i>
                    </i>
                    <i class="pos">
                        <i class="method-name">&lt;footer&gt;</i>
                        <i class="pos">&copy; Freedom App</i>
                        <i class="method-name">&lt;/footer&gt;</i>
                    </i>
                    <i class="method-name">&lt;/body&gt;</i>
                </i>
                <i class="method-name">&lt;/html&gt;</i>
            </i>
        </code>
        At route-handle:
        <code>
            <i class="pos comment">// This for list</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list\'</i><i class="internal-brown">, function</i>() {
                <i class="pos"><i class="var">$render</i> = Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.list\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'List page\'</i> ])<i class="internal-brown">;</i></i>            
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addCss</i>(<i class="value-str">\'content\'<i class="internal-brown">,</i> \'styles.list\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="internal-brown">return <i class="var">$render</i>;</i></i>
            })<i class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos comment">// This for detail</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list/{id}\'</i><i class="internal-brown">, function</i>(Request <i class="var">$request</i>) {
                <i class="pos"><i class="var">$id</i> = <i class="var">$request</i>-><i class="method-name">get</i>(<i class="value-str">\'id\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="var">$render</i> = Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.detail\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'Detail page\'</i><i class="internal-brown">,</i> <i class="value-str">\'content\'</i> => <i class="value-str">"Item ID: </i>{<i class="var">$id</i>}<i class="value-str">"</i> ])<i class="internal-brown">;</i></i>            
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addCss</i>(<i class="value-str">\'content\'<i class="internal-brown">,</i> \'styles.detail\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="internal-brown">return <i class="var">$render</i>;</i></i>
            })<i class="internal-brown">;</i></i>
        </code>
        You can use common styles, or unique for every pages.
    </p>
</div>
<div class="article-part">
    <h3 id="js">JS</h3>
    <p>
        You can turn-on javascript files like a css, but different methods <q>yieldJs()</q>.
        Just imagine, that we have created several scripts at <q>public/scripts</q>,
         this is <q>list.js</q>, <q>detail.js</q> and <q>form.js</q>.
        Fast example:
        <code>
            <i class="pos comment">&lt;!-- in resources/layouts/main/index.php --&gt;</i>
            <i class="pos">
                <i class="method-name">&lt;html&gt;</i>
                <i class="pos">
                    <i class="method-name">&lt;head&gt;</i>
                    <i class="pos">
                        <i class="method-name">&lt;title&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$title</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/title&gt;</i>
                    </i>
                    <i class="pos"><i class="internal-brown">&lt;?= </i><i class="var">$this</i>-><i class="method-name">yieldCss</i>(<i class="value-str">\'content\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                    <i class="method-name">&lt;/head&gt;</i>
                </i>
                <i class="pos">
                    <i class="method-name">&lt;body&gt;</i>
                    <i class="pos">
                        <i class="method-name">&lt;header&gt;</i> 
                        <i class="pos"><i class="method-name">&lt;h1&gt;</i>Header<i class="method-name">&lt;/h1&gt;</i></i>
                        <i class="pos"><i class="method-name">&lt;h2&gt;</i><i class="internal-brown">&lt;?=</i> <i class="var">$title</i><i class="internal-brown">; ?&gt;</i><i class="method-name">&lt;/h2&gt;</i></i>
                        <i class="method-name">&lt;/header&gt;</i>
                    </i>
                    <i class="pos">
                        <i class="method-name">&lt;div</i> class=<i class="value-str">"content"</i><i class="method-name">&gt;</i>
                        <i class="pos"><i class="internal-brown">&lt;?=</i> <i class="var">$this</i>-><i class="method-name">renderTemplate</i>(<i class="value-str">\'page\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                        <i class="method-name">&lt;/div&gt;</i>
                    </i>
                    <i class="pos">
                        <i class="method-name">&lt;footer&gt;</i>
                        <i class="pos">&copy; Freedom App</i>
                        <i class="pos comment">&lt;!-- Yield for scripts --&gt;</i>
                        <i class="pos"><i class="internal-brown">&lt;?= </i><i class="var">$this</i>-><i class="method-name">yieldJs</i>(<i class="value-str">\'script\'</i>)<i class="internal-brown">; ?&gt;</i></i>
                        <i class="method-name">&lt;/footer&gt;</i>
                    </i>
                    <i class="method-name">&lt;/body&gt;</i>
                </i>
                <i class="method-name">&lt;/html&gt;</i>
            </i>
        </code>
        At route-handle:
        <code>
            <i class="pos comment">// This for list</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list\'</i><i class="internal-brown">, function</i>() {
                <i class="pos"><i class="var">$render</i> = Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.list\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'List page\'</i> ])<i class="internal-brown">;</i></i>            
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addCss</i>(<i class="value-str">\'content\'<i class="internal-brown">,</i> \'styles.list\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addJs</i>(<i class="value-str">\'script\'<i class="internal-brown">,</i> \'scrips.list\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="internal-brown">return <i class="var">$render</i>;</i></i>
            })<i class="internal-brown">;</i></i>
            &nbsp;
            <i class="pos comment">// This for detail</i>
            <i class="pos">Route::<i class="method-name">get</i>(<i class="value-str">\'/list/{id}\'</i><i class="internal-brown">, function</i>(Request <i class="var">$request</i>) {
                <i class="pos"><i class="var">$id</i> = <i class="var">$request</i>-><i class="method-name">get</i>(<i class="value-str">\'id\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="var">$render</i> = Layout::<i class="method-name">view</i>(<i class="value-str">\'main\'</i><i class="internal-brown">,</i> [ <i class="value-str">\'page\'</i> => <i class="value-str">\'pages.detail\'</i> ]<i class="internal-brown">,</i> [ <i class="value-str">\'title\'</i> => <i class="value-str">\'Detail page\'</i><i class="internal-brown">,</i> <i class="value-str">\'content\'</i> => <i class="value-str">"Item ID: </i>{<i class="var">$id</i>}<i class="value-str">"</i> ])<i class="internal-brown">;</i></i>            
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addCss</i>(<i class="value-str">\'content\'<i class="internal-brown">,</i> \'styles.detail\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addJs</i>(<i class="value-str">\'script\'<i class="internal-brown">,</i> \'scripts.detail\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="var">$render</i>-><i class="method-name">addJs</i>(<i class="value-str">\'script\'<i class="internal-brown">,</i> \'scripts.form\'</i>)<i class="internal-brown">;</i></i>
                <i class="pos"><i class="internal-brown">return <i class="var">$render</i>;</i></i>
            })<i class="internal-brown">;</i></i>
        </code>
    </p>
</div>
',
            ],
        ];

        if (!isset($pages[$key])) {
            return Layout::view('main', [
                'page' => 'pages.404',
            ]);
        }

        $render = Layout::view('main',
            ['page' => 'pages.docs.index', 'doc_chapter' => 'pages.docs.mvc.index'],
            $pages[$key],
        );

        $render->addCss('head', 'css.docs');
        return $render;
    }
}
