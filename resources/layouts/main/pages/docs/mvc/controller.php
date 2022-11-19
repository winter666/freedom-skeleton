<div>
    <div class="article-part">
        <h2>Controller</h2>
        <div>
            <ul class="article-content">
                <li class="item"><a href="#syntax">Syntax</a></li>
                <li class="item"><a href="#request">Request</a></li>
                <li class="item"><a href="#response">Response</a></li>
            </ul>
        </div>
        <p>
            Module Controller allows you to handle request from client.
        </p>
    </div>
    <div class="article-part">
        <h3 id="syntax">Syntax</h3>
        <p>
            A controller is a class that has methods for handling specific routes.
            Basic usage:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">'/some-url'</i>, [<i
                            class="value-str">'controller'</i> => SomeController::<i class="internal-brown">class,</i>
                    <i
                            class="value-str">'method'</i> => <i class="value-str">'someMethod'</i>])<i
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
                    <i class="pos"><i class="var">$request</i>-><i class="method-name">get</i>(<i class="value-str">'some_value_from_client'</i>)<i
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
                    <i class="pos"><i class="internal-brown">return</i> <i class="value-str">'Hello world!'</i></i>
                </i>
                <i class="pos">}</i>
                &nbsp;
                <i class="pos comment">// As a Freedom\Modules\Render\Render template</i>
                <i class="pos"><i class="internal-brown">public function</i> <i class="method-name">responseWithLayoutMethod</i>()
                    {</i>
                <i class="pos">
                    <!-- TODO: допилить -->
                    <i class="pos"><i class="internal-brown">return</i> <i>'Hello world!'</i></i>
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
                                class="method-name">sendJson</i>([<i class="value-str">'value'</i> => <i
                                class="value-str">'Hello world!'</i>])<i class="internal-brown">;</i></i>
                </i>
                <i class="pos">}</i>
                &nbsp;
                <br/>
            }
            </i>
        </code>
    </div>
</div>
