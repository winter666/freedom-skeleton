<div>
    <div class="article-part">
        <h2>Router</h2>
        <div>
            <ul class="article-content">
                <li class="item"><a href="#syntax">Syntax</a></li>
                <li class="item"><a href="#handle-requests">Handle Requests</a></li>
                <li class="item"><a href="#handle-404">Handle 404</a></li>
            </ul>
        </div>
        <p>
            Module Router allows you to write convenient human-readable links with various processing methods.
        </p>
    </div>
    <div class="article-part">
        <h3 id="syntax">Syntax</h3>
        <p>
            Syntax for routing similar with Laravel.
        </p>
        <p>
            This is functional use syntax:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">'/some-url'</i><i class="internal-brown">, function</i> () { <i class="comment">// Some body</i> })<i class="internal-brown">;</i></i>
            </code>
        </p>
        <p>
            This is Controller use syntax:
            <code>
                <i class="pos">Router::<i class="method-name">get</i>(<i class="value-str">'/some-url'</i>, [<i class="value-str">'controller'</i> => SomeController::<i class="internal-brown">class,</i> <i class="value-str">'method'</i> => <i class="value-str">'someMethodName'</i>])<i class="internal-brown">;</i></i>
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
            It's may be a Controller-use handle:
            <code>
                <i class="pos">Router::<i class="method-name">fallback</i>([<i class="value-str">'controller'</i> => FallbackController::<i class="internal-brown">class,</i> <i class="value-str">'method'</i> => <i class="value-str">'handleMethodName'</i>])<i class="internal-brown">;</i></i>
            </code>
        </p>
    </div>
</div>
