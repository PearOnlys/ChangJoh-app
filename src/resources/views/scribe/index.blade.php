<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.0.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.0.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-01user" class="tocify-header">
                <li class="tocify-item level-1" data-unique="01user">
                    <a href="#01user">01.User</a>
                </li>
                                    <ul id="tocify-subheader-01user" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="01user-POSTapi-register">
                                <a href="#01user-POSTapi-register">Register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="01user-POSTapi-login">
                                <a href="#01user-POSTapi-login">Login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="01user-GETapi-logout">
                                <a href="#01user-GETapi-logout">Logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="01user-GETapi-user-infomation">
                                <a href="#01user-GETapi-user-infomation">Show user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="01user-POSTapi-user-infomation">
                                <a href="#01user-POSTapi-user-infomation">Update user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-02profile" class="tocify-header">
                <li class="tocify-item level-1" data-unique="02profile">
                    <a href="#02profile">02.Profile</a>
                </li>
                                    <ul id="tocify-subheader-02profile" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="02profile-POSTapi-profile-create">
                                <a href="#02profile-POSTapi-profile-create">Create a profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="02profile-GETapi-profile-list">
                                <a href="#02profile-GETapi-profile-list">Profiles list</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="02profile-GETapi-profile--id-">
                                <a href="#02profile-GETapi-profile--id-">Show a profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="02profile-POSTapi-profile--id--edit">
                                <a href="#02profile-POSTapi-profile--id--edit">Edit a profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-03patient-type" class="tocify-header">
                <li class="tocify-item level-1" data-unique="03patient-type">
                    <a href="#03patient-type">03.Patient type</a>
                </li>
                                    <ul id="tocify-subheader-03patient-type" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="03patient-type-GETapi-type">
                                <a href="#03patient-type-GETapi-type">Show all patient type</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="03patient-type-POSTapi-type">
                                <a href="#03patient-type-POSTapi-type">Add a patient type</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-04deck" class="tocify-header">
                <li class="tocify-item level-1" data-unique="04deck">
                    <a href="#04deck">04.Deck</a>
                </li>
                                    <ul id="tocify-subheader-04deck" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="04deck-GETapi-profile--id--deck-list">
                                <a href="#04deck-GETapi-profile--id--deck-list">Show all deck of a profile that were not hidden</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-GETapi-profile--id--deck-edit">
                                <a href="#04deck-GETapi-profile--id--deck-edit">Show all deck of a profile, even hidden</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-POSTapi-profile--id--deck-create">
                                <a href="#04deck-POSTapi-profile--id--deck-create">Create & add deck to profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-GETapi-deck--deck_id-">
                                <a href="#04deck-GETapi-deck--deck_id-">Show a deck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-POSTapi-deck--deck_id--edit">
                                <a href="#04deck-POSTapi-deck--deck_id--edit">Edit deck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-POSTapi-deck--deck_id--hide">
                                <a href="#04deck-POSTapi-deck--deck_id--hide">Hide deck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-POSTapi-deck--deck_id--delete">
                                <a href="#04deck-POSTapi-deck--deck_id--delete">Delete deck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="04deck-POSTapi-deck--deck_id--copy">
                                <a href="#04deck-POSTapi-deck--deck_id--copy">Copy deck to other profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-05card" class="tocify-header">
                <li class="tocify-item level-1" data-unique="05card">
                    <a href="#05card">05.Card</a>
                </li>
                                    <ul id="tocify-subheader-05card" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="05card-GETapi-deck--deck_id--card-list">
                                <a href="#05card-GETapi-deck--deck_id--card-list">Show all card of a deck that were unhidden</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-GETapi-deck--deck_id--card-edit">
                                <a href="#05card-GETapi-deck--deck_id--card-edit">Show all card of a deck, even hidden</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-POSTapi-deck--deck_id--card-create">
                                <a href="#05card-POSTapi-deck--deck_id--card-create">Create & add card to deck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-GETapi-deck--deck_id--card--card_id-">
                                <a href="#05card-GETapi-deck--deck_id--card--card_id-">Show a card</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-POSTapi-deck--deck_id--card--card_id--edit">
                                <a href="#05card-POSTapi-deck--deck_id--card--card_id--edit">Edit a card</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-GETapi-deck--deck_id--card--card_id--delete">
                                <a href="#05card-GETapi-deck--deck_id--card--card_id--delete">Delete card</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="05card-POSTapi-deck--deck_id--card--card_id--hide">
                                <a href="#05card-POSTapi-deck--deck_id--card--card_id--hide">Hide card in a deck</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 26 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="01user">01.User</h1>

    

                                <h2 id="01user-POSTapi-register">Register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"grant_type\": \"password\",
    \"client_id\": \"1\",
    \"client_secret\": \"secret\",
    \"mobile\": \"0812345678\",
    \"scope\": \"*\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "grant_type": "password",
    "client_id": "1",
    "client_secret": "secret",
    "mobile": "0812345678",
    "scope": "*"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;token&quot;: {
        &quot;token_type&quot;: &quot;Bearer&quot;,
        &quot;expires_in&quot;: 31536000,
        &quot;access_token&quot;: &quot;eyJ0eXA...&quot;,
        &quot;refresh_token&quot;: &quot;def50200a...&quot;
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>grant_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="grant_type"
               data-endpoint="POSTapi-register"
               value="password"
               data-component="body" hidden>
    <br>
<p>password.</p>
        </p>
                <p>
            <b><code>client_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="client_id"
               data-endpoint="POSTapi-register"
               value="1"
               data-component="body" hidden>
    <br>
<p>client_id.</p>
        </p>
                <p>
            <b><code>client_secret</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="client_secret"
               data-endpoint="POSTapi-register"
               value="secret"
               data-component="body" hidden>
    <br>
<p>client's secret.</p>
        </p>
                <p>
            <b><code>mobile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="mobile"
               data-endpoint="POSTapi-register"
               value="0812345678"
               data-component="body" hidden>
    <br>
<p>username.</p>
        </p>
                <p>
            <b><code>scope</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="scope"
               data-endpoint="POSTapi-register"
               value="*"
               data-component="body" hidden>
    <br>
<p>scope.</p>
        </p>
        </form>

                    <h2 id="01user-POSTapi-login">Login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"grant_type\": \"password\",
    \"client_id\": \"1\",
    \"client_secret\": \"secret\",
    \"mobile\": \"0812345678\",
    \"scope\": \"*\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "grant_type": "password",
    "client_id": "1",
    "client_secret": "secret",
    "mobile": "0812345678",
    "scope": "*"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;token&quot;: {
        &quot;token_type&quot;: &quot;Bearer&quot;,
        &quot;expires_in&quot;: 31536000,
        &quot;access_token&quot;: &quot;eyJ0eXA...&quot;,
        &quot;refresh_token&quot;: &quot;def50200a...&quot;
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>grant_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="grant_type"
               data-endpoint="POSTapi-login"
               value="password"
               data-component="body" hidden>
    <br>
<p>password.</p>
        </p>
                <p>
            <b><code>client_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="client_id"
               data-endpoint="POSTapi-login"
               value="1"
               data-component="body" hidden>
    <br>
<p>client_id.</p>
        </p>
                <p>
            <b><code>client_secret</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="client_secret"
               data-endpoint="POSTapi-login"
               value="secret"
               data-component="body" hidden>
    <br>
<p>client's secret.</p>
        </p>
                <p>
            <b><code>mobile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="mobile"
               data-endpoint="POSTapi-login"
               value="0812345678"
               data-component="body" hidden>
    <br>
<p>username.</p>
        </p>
                <p>
            <b><code>scope</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="scope"
               data-endpoint="POSTapi-login"
               value="*"
               data-component="body" hidden>
    <br>
<p>scope.</p>
        </p>
        </form>

                    <h2 id="01user-GETapi-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-logout">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-logout"></code></pre>
</span>
<span id="execution-error-GETapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-logout"></code></pre>
</span>
<form id="form-GETapi-logout" data-method="GET"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-logout"
                    onclick="tryItOut('GETapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-logout"
                    onclick="cancelTryOut('GETapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/logout</code></b>
        </p>
                <p>
            <label id="auth-GETapi-logout" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-logout"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="01user-GETapi-user-infomation">Show user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user-infomation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user/infomation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/infomation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user-infomation">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;mobile&quot;: &quot;0873000207&quot;,
        &quot;mobile_verified_at&quot;: &quot;2022-09-21T09:29:03.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-09-21T09:29:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-09-21T09:29:04.000000Z&quot;,
        &quot;deleted_at&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-infomation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-infomation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-infomation"></code></pre>
</span>
<span id="execution-error-GETapi-user-infomation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-infomation"></code></pre>
</span>
<form id="form-GETapi-user-infomation" data-method="GET"
      data-path="api/user/infomation"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-infomation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-infomation"
                    onclick="tryItOut('GETapi-user-infomation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-infomation"
                    onclick="cancelTryOut('GETapi-user-infomation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-infomation" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/infomation</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user-infomation" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-user-infomation"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="01user-POSTapi-user-infomation">Update user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-user-infomation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/user/infomation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"mobile\": \"blanditiis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/infomation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile": "blanditiis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-infomation">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;mobile&quot;: &quot;0873040207&quot;,
        &quot;mobile_verified_at&quot;: &quot;2022-09-21T09:29:03.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-09-21T09:29:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-09-23T05:23:46.000000Z&quot;,
        &quot;deleted_at&quot;: null
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user-infomation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-infomation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-infomation"></code></pre>
</span>
<span id="execution-error-POSTapi-user-infomation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-infomation"></code></pre>
</span>
<form id="form-POSTapi-user-infomation" data-method="POST"
      data-path="api/user/infomation"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-infomation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-infomation"
                    onclick="tryItOut('POSTapi-user-infomation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-infomation"
                    onclick="cancelTryOut('POSTapi-user-infomation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-infomation" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/infomation</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-user-infomation" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-user-infomation"
                       data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>mobile</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="mobile"
               data-endpoint="POSTapi-user-infomation"
               value="blanditiis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                <h1 id="02profile">02.Profile</h1>

    

                                <h2 id="02profile-POSTapi-profile-create">Create a profile</h2>

<p>
</p>



<span id="example-requests-POSTapi-profile-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/profile/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"veritatis\",
    \"type_ids\": \"omnis\",
    \"image\": \"est\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "veritatis",
    "type_ids": "omnis",
    "image": "est"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-profile-create">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;profile&quot;: {
       &quot;id&quot;: 9,
       &quot;name&quot;: &quot;Eddy&quot;,
       &quot;patient_type&quot;: &quot;4&quot;,
       &quot;decks&quot;: [
           {
               &quot;id&quot;: 22
           },
           {
               &quot;id&quot;: 23
           },
       ]
   },
   &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-profile-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-profile-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-profile-create"></code></pre>
</span>
<span id="execution-error-POSTapi-profile-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-profile-create"></code></pre>
</span>
<form id="form-POSTapi-profile-create" data-method="POST"
      data-path="api/profile/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-profile-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-profile-create"
                    onclick="tryItOut('POSTapi-profile-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-profile-create"
                    onclick="cancelTryOut('POSTapi-profile-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-profile-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/profile/create</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-profile-create"
               value="veritatis"
               data-component="body" hidden>
    <br>
<p>name</p>
        </p>
                <p>
            <b><code>type_ids</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="type_ids"
               data-endpoint="POSTapi-profile-create"
               value="omnis"
               data-component="body" hidden>
    <br>
<p>type_ids</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;
<small>image</small>&nbsp;
 &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-profile-create"
               value="est"
               data-component="body" hidden>
    <br>
<p>image mimes:jpg,png,jpeg,gif,svg,webp</p>
        </p>
        </form>

                    <h2 id="02profile-GETapi-profile-list">Profiles list</h2>

<p>
</p>



<span id="example-requests-GETapi-profile-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/profile/list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;profile list&quot;: [
       {
           &quot;id&quot;: 1,
           &quot;user_id&quot;: 1,
           &quot;name&quot;: &quot;Emmy&quot;,
           &quot;image_path&quot;: &quot;images/profiles/202209221207alert.png&quot;,
           &quot;created_at&quot;: &quot;2022-09-21T09:29:04.000000Z&quot;,
           &quot;updated_at&quot;: &quot;2022-09-22T12:07:12.000000Z&quot;,
           &quot;deleted_at&quot;: null
       }
   }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile-list"></code></pre>
</span>
<span id="execution-error-GETapi-profile-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile-list"></code></pre>
</span>
<form id="form-GETapi-profile-list" data-method="GET"
      data-path="api/profile/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile-list"
                    onclick="tryItOut('GETapi-profile-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile-list"
                    onclick="cancelTryOut('GETapi-profile-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile/list</code></b>
        </p>
                    </form>

                    <h2 id="02profile-GETapi-profile--id-">Show a profile</h2>

<p>
</p>



<span id="example-requests-GETapi-profile--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/profile/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;profile&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Emmy&quot;,
        &quot;image&quot;: &quot;images/profiles/202209221207alert.png&quot;,
        &quot;patient_type&quot;: 4
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile--id-"></code></pre>
</span>
<span id="execution-error-GETapi-profile--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile--id-"></code></pre>
</span>
<form id="form-GETapi-profile--id-" data-method="GET"
      data-path="api/profile/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile--id-"
                    onclick="tryItOut('GETapi-profile--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile--id-"
                    onclick="cancelTryOut('GETapi-profile--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-profile--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the profile.</p>
            </p>
                    </form>

                    <h2 id="02profile-POSTapi-profile--id--edit">Edit a profile</h2>

<p>
</p>



<span id="example-requests-POSTapi-profile--id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/profile/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"qui\",
    \"type_id\": \"et\",
    \"image\": \"saepe\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "qui",
    "type_id": "et",
    "image": "saepe"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-profile--id--edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;profile&quot;: {
        &quot;name&quot;: &quot;Merry&quot;,
        &quot;id&quot;: 6,
        &quot;user_id&quot;: 1,
        &quot;patient_type&quot;: &quot;4&quot;,
        &quot;decks&quot;: [
            {
                &quot;id&quot;: 11
            }
        ]
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-profile--id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-profile--id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-profile--id--edit"></code></pre>
</span>
<span id="execution-error-POSTapi-profile--id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-profile--id--edit"></code></pre>
</span>
<form id="form-POSTapi-profile--id--edit" data-method="POST"
      data-path="api/profile/{id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-profile--id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-profile--id--edit"
                    onclick="tryItOut('POSTapi-profile--id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-profile--id--edit"
                    onclick="cancelTryOut('POSTapi-profile--id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-profile--id--edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/profile/{id}/edit</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-profile--id--edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the profile.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-profile--id--edit"
               value="qui"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>type_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="type_id"
               data-endpoint="POSTapi-profile--id--edit"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;
<small>image</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-profile--id--edit"
               value="saepe"
               data-component="body" hidden>
    <br>
<p>mimes:jpg,png,jpeg,gif,svg,webp</p>
        </p>
        </form>

                <h1 id="03patient-type">03.Patient type</h1>

    

                                <h2 id="03patient-type-GETapi-type">Show all patient type</h2>

<p>
</p>



<span id="example-requests-GETapi-type">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/type" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/type"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-type">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;types&quot;: [
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;debitis&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-type" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-type"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-type"></code></pre>
</span>
<span id="execution-error-GETapi-type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-type"></code></pre>
</span>
<form id="form-GETapi-type" data-method="GET"
      data-path="api/type"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-type', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-type"
                    onclick="tryItOut('GETapi-type');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-type"
                    onclick="cancelTryOut('GETapi-type');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-type" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/type</code></b>
        </p>
                    </form>

                    <h2 id="03patient-type-POSTapi-type">Add a patient type</h2>

<p>
</p>



<span id="example-requests-POSTapi-type">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/type" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/type"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-type">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;type&quot;: {
        &quot;id&quot;: 13,
        &quot;name&quot;: &quot;stroke&quot;
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-type" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-type"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-type"></code></pre>
</span>
<span id="execution-error-POSTapi-type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-type"></code></pre>
</span>
<form id="form-POSTapi-type" data-method="POST"
      data-path="api/type"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-type', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-type"
                    onclick="tryItOut('POSTapi-type');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-type"
                    onclick="cancelTryOut('POSTapi-type');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-type" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/type</code></b>
        </p>
                    </form>

                <h1 id="04deck">04.Deck</h1>

    

                                <h2 id="04deck-GETapi-profile--id--deck-list">Show all deck of a profile that were not hidden</h2>

<p>
</p>



<span id="example-requests-GETapi-profile--id--deck-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/profile/1/deck/list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/1/deck/list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile--id--deck-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;decks&quot;: [
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;ipsam&quot;,
            &quot;image_path&quot;: null
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;laudantium&quot;,
            &quot;image_path&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile--id--deck-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile--id--deck-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile--id--deck-list"></code></pre>
</span>
<span id="execution-error-GETapi-profile--id--deck-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile--id--deck-list"></code></pre>
</span>
<form id="form-GETapi-profile--id--deck-list" data-method="GET"
      data-path="api/profile/{id}/deck/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile--id--deck-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile--id--deck-list"
                    onclick="tryItOut('GETapi-profile--id--deck-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile--id--deck-list"
                    onclick="cancelTryOut('GETapi-profile--id--deck-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile--id--deck-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile/{id}/deck/list</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-profile--id--deck-list"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the profile.</p>
            </p>
                    </form>

                    <h2 id="04deck-GETapi-profile--id--deck-edit">Show all deck of a profile, even hidden</h2>

<p>
</p>



<span id="example-requests-GETapi-profile--id--deck-edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/profile/1/deck/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/1/deck/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile--id--deck-edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;decks&quot;: [
       {
           &quot;id&quot;: 12,
           &quot;name&quot;: &quot;ipsam&quot;,
           &quot;image_path&quot;: null,
           &quot;is_hidden&quot;: 0
       },
       {
           &quot;id&quot;: 13,
           &quot;name&quot;: &quot;laudantium&quot;,
           &quot;image_path&quot;: null
           &quot;is_hidden&quot;: 1

       }
    ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile--id--deck-edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile--id--deck-edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile--id--deck-edit"></code></pre>
</span>
<span id="execution-error-GETapi-profile--id--deck-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile--id--deck-edit"></code></pre>
</span>
<form id="form-GETapi-profile--id--deck-edit" data-method="GET"
      data-path="api/profile/{id}/deck/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile--id--deck-edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile--id--deck-edit"
                    onclick="tryItOut('GETapi-profile--id--deck-edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile--id--deck-edit"
                    onclick="cancelTryOut('GETapi-profile--id--deck-edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile--id--deck-edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile/{id}/deck/edit</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-profile--id--deck-edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the profile.</p>
            </p>
                    </form>

                    <h2 id="04deck-POSTapi-profile--id--deck-create">Create &amp; add deck to profile</h2>

<p>
</p>



<span id="example-requests-POSTapi-profile--id--deck-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/profile/1/deck/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile/1/deck/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-profile--id--deck-create">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;deck&quot;: {
        &quot;name&quot;: &quot;Car&quot;,
        &quot;profile_id&quot;: &quot;7&quot;,
        &quot;deck_order&quot;: 4,
        &quot;updated_at&quot;: &quot;2022-09-23T06:31:05.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-09-23T06:31:05.000000Z&quot;,
        &quot;id&quot;: 26
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-profile--id--deck-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-profile--id--deck-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-profile--id--deck-create"></code></pre>
</span>
<span id="execution-error-POSTapi-profile--id--deck-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-profile--id--deck-create"></code></pre>
</span>
<form id="form-POSTapi-profile--id--deck-create" data-method="POST"
      data-path="api/profile/{id}/deck/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-profile--id--deck-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-profile--id--deck-create"
                    onclick="tryItOut('POSTapi-profile--id--deck-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-profile--id--deck-create"
                    onclick="cancelTryOut('POSTapi-profile--id--deck-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-profile--id--deck-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/profile/{id}/deck/create</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-profile--id--deck-create"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the profile.</p>
            </p>
                    </form>

                    <h2 id="04deck-GETapi-deck--deck_id-">Show a deck</h2>

<p>
</p>



<span id="example-requests-GETapi-deck--deck_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/deck/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-deck--deck_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;decks&quot;: {
        &quot;id&quot;: 12,
        &quot;name&quot;: &quot;ipsam&quot;,
        &quot;is_hidden&quot;: 0,
        &quot;image_path&quot;: &quot;images/decks/202209261050imagefile.png&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-deck--deck_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-deck--deck_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-deck--deck_id-"></code></pre>
</span>
<span id="execution-error-GETapi-deck--deck_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-deck--deck_id-"></code></pre>
</span>
<form id="form-GETapi-deck--deck_id-" data-method="GET"
      data-path="api/deck/{deck_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-deck--deck_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-deck--deck_id-"
                    onclick="tryItOut('GETapi-deck--deck_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-deck--deck_id-"
                    onclick="cancelTryOut('GETapi-deck--deck_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-deck--deck_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/deck/{deck_id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="GETapi-deck--deck_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="04deck-POSTapi-deck--deck_id--edit">Edit deck</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;deck&quot;: {
        &quot;id&quot;: 26,
        &quot;name&quot;: &quot;Carry&quot;,
        &quot;global&quot;: 0,
        &quot;profile_id&quot;: 7,
        &quot;image_path&quot;: &quot;images/decks/202209230636login-register.jpg&quot;,
        &quot;deck_order&quot;: 4,
        &quot;hidden&quot;: 0,
        &quot;created_at&quot;: &quot;2022-09-23T06:31:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-09-23T06:36:36.000000Z&quot;,
        &quot;deleted_at&quot;: null
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--edit"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--edit"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--edit" data-method="POST"
      data-path="api/deck/{deck_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--edit"
                    onclick="tryItOut('POSTapi-deck--deck_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--edit"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/edit</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="04deck-POSTapi-deck--deck_id--hide">Hide deck</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--hide">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/hide" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/hide"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--hide">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;hidden&quot;: true,
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--hide" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--hide"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--hide"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--hide" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--hide"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--hide" data-method="POST"
      data-path="api/deck/{deck_id}/hide"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--hide', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--hide"
                    onclick="tryItOut('POSTapi-deck--deck_id--hide');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--hide"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--hide');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--hide" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/hide</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--hide"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="04deck-POSTapi-deck--deck_id--delete">Delete deck</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/delete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;msg&quot;: &quot;Deck delete&quot;,
    &quot;success&quot;: false
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--delete"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--delete"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--delete" data-method="POST"
      data-path="api/deck/{deck_id}/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--delete"
                    onclick="tryItOut('POSTapi-deck--deck_id--delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--delete"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/delete</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--delete"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="04deck-POSTapi-deck--deck_id--copy">Copy deck to other profile</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--copy">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/copy" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"profile_ids\": \"commodi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/copy"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "profile_ids": "commodi"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--copy">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--copy" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--copy"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--copy"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--copy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--copy"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--copy" data-method="POST"
      data-path="api/deck/{deck_id}/copy"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--copy', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--copy"
                    onclick="tryItOut('POSTapi-deck--deck_id--copy');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--copy"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--copy');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--copy" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/copy</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--copy"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>profile_ids</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="profile_ids"
               data-endpoint="POSTapi-deck--deck_id--copy"
               value="commodi"
               data-component="body" hidden>
    <br>
<p>The profile that wanted to copy the deck to.</p>
        </p>
        </form>

                <h1 id="05card">05.Card</h1>

    

                                <h2 id="05card-GETapi-deck--deck_id--card-list">Show all card of a deck that were unhidden</h2>

<p>
</p>



<span id="example-requests-GETapi-deck--deck_id--card-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/deck/1/card/list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-deck--deck_id--card-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;cards&quot;: [
       {
           &quot;card_id&quot;: 8,
           &quot;word&quot;: &quot;voluptatem&quot;,
           &quot;image_path&quot;: null,
           &quot;audio_path&quot;: null,
       }
   ],
   &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-deck--deck_id--card-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-deck--deck_id--card-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-deck--deck_id--card-list"></code></pre>
</span>
<span id="execution-error-GETapi-deck--deck_id--card-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-deck--deck_id--card-list"></code></pre>
</span>
<form id="form-GETapi-deck--deck_id--card-list" data-method="GET"
      data-path="api/deck/{deck_id}/card/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-deck--deck_id--card-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-deck--deck_id--card-list"
                    onclick="tryItOut('GETapi-deck--deck_id--card-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-deck--deck_id--card-list"
                    onclick="cancelTryOut('GETapi-deck--deck_id--card-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-deck--deck_id--card-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/deck/{deck_id}/card/list</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="GETapi-deck--deck_id--card-list"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="05card-GETapi-deck--deck_id--card-edit">Show all card of a deck, even hidden</h2>

<p>
</p>



<span id="example-requests-GETapi-deck--deck_id--card-edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/deck/1/card/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-deck--deck_id--card-edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
   &quot;cards&quot;: [
       {
           &quot;card_id&quot;: 8,
           &quot;word&quot;: &quot;voluptatem&quot;,
           &quot;image_path&quot;: null,
           &quot;audio_path&quot;: null,
       },
       {
           &quot;card_id&quot;: 6,
           &quot;word&quot;: &quot;rerum&quot;,
           &quot;image_path&quot;: null,
           &quot;audio_path&quot;: null,
       }
   ],
   &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-deck--deck_id--card-edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-deck--deck_id--card-edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-deck--deck_id--card-edit"></code></pre>
</span>
<span id="execution-error-GETapi-deck--deck_id--card-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-deck--deck_id--card-edit"></code></pre>
</span>
<form id="form-GETapi-deck--deck_id--card-edit" data-method="GET"
      data-path="api/deck/{deck_id}/card/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-deck--deck_id--card-edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-deck--deck_id--card-edit"
                    onclick="tryItOut('GETapi-deck--deck_id--card-edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-deck--deck_id--card-edit"
                    onclick="cancelTryOut('GETapi-deck--deck_id--card-edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-deck--deck_id--card-edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/deck/{deck_id}/card/edit</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="GETapi-deck--deck_id--card-edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    </form>

                    <h2 id="05card-POSTapi-deck--deck_id--card-create">Create &amp; add card to deck</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--card-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/card/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"word\": \"delectus\",
    \"image\": \"quidem\",
    \"audio\": \"dolore\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "word": "delectus",
    "image": "quidem",
    "audio": "dolore"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--card-create">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;card&quot;: {
        &quot;word&quot;: &quot;Merry&quot;,
        &quot;is_global&quot;: false,
        &quot;image_path&quot;: &quot;images/cards/202209230745login-register.jpg&quot;,
        &quot;audio_path&quot;: &quot;audio/cards/202209230821audiofileMP3.mp3&quot;,
        &quot;updated_at&quot;: &quot;2022-09-23T07:45:31.000000Z&quot;,
        &quot;created_at&quot;: &quot;2022-09-23T07:45:31.000000Z&quot;,
        &quot;id&quot;: 22
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--card-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--card-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--card-create"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--card-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--card-create"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--card-create" data-method="POST"
      data-path="api/deck/{deck_id}/card/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--card-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--card-create"
                    onclick="tryItOut('POSTapi-deck--deck_id--card-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--card-create"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--card-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--card-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/card/create</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--card-create"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>word</code></b>&nbsp;&nbsp;
<small>required</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="word"
               data-endpoint="POSTapi-deck--deck_id--card-create"
               value="delectus"
               data-component="body" hidden>
    <br>
<p>string</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;
<small>required</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-deck--deck_id--card-create"
               value="quidem"
               data-component="body" hidden>
    <br>
<p>mimes:jpg,png,jpeg,gif,svg,webp</p>
        </p>
                <p>
            <b><code>audio</code></b>&nbsp;&nbsp;
<small>audio</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="audio"
               data-endpoint="POSTapi-deck--deck_id--card-create"
               value="dolore"
               data-component="body" hidden>
    <br>
<p>mime:mimes:mp3,mpga,wav,ogg</p>
        </p>
        </form>

                    <h2 id="05card-GETapi-deck--deck_id--card--card_id-">Show a card</h2>

<p>
</p>



<span id="example-requests-GETapi-deck--deck_id--card--card_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/deck/1/card/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-deck--deck_id--card--card_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;card&quot;: {
        &quot;id&quot;: 35,
        &quot;word&quot;: &quot;MerryWaether&quot;,
        &quot;image_path&quot;: &quot;images/cards/202209230745imagefilejpg.jpg&quot;,
        &quot;audio_path&quot;: &quot;audio/cards/202209230821audiofileMP3.mp3&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-deck--deck_id--card--card_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-deck--deck_id--card--card_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-deck--deck_id--card--card_id-"></code></pre>
</span>
<span id="execution-error-GETapi-deck--deck_id--card--card_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-deck--deck_id--card--card_id-"></code></pre>
</span>
<form id="form-GETapi-deck--deck_id--card--card_id-" data-method="GET"
      data-path="api/deck/{deck_id}/card/{card_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-deck--deck_id--card--card_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-deck--deck_id--card--card_id-"
                    onclick="tryItOut('GETapi-deck--deck_id--card--card_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-deck--deck_id--card--card_id-"
                    onclick="cancelTryOut('GETapi-deck--deck_id--card--card_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-deck--deck_id--card--card_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/deck/{deck_id}/card/{card_id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="GETapi-deck--deck_id--card--card_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    <p>
                <b><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="card_id"
               data-endpoint="GETapi-deck--deck_id--card--card_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the card.</p>
            </p>
                    </form>

                    <h2 id="05card-POSTapi-deck--deck_id--card--card_id--edit">Edit a card</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--card--card_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/card/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"word\": \"culpa\",
    \"image\": \"earum\",
    \"audio\": \"eum\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "word": "culpa",
    "image": "earum",
    "audio": "eum"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--card--card_id--edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;card&quot;: {
        &quot;id&quot;: 35,
        &quot;is_global&quot;: false,
        &quot;word&quot;: &quot;MerryWaether&quot;,
        &quot;image_path&quot;: &quot;images/cards/202209230745imagefilejpg.jpg&quot;,
        &quot;audio_path&quot;: &quot;audio/cards/202209230821audiofileMP3.mp3&quot;
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--card--card_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--card--card_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--card--card_id--edit"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--card--card_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--card--card_id--edit"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--card--card_id--edit" data-method="POST"
      data-path="api/deck/{deck_id}/card/{card_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--card--card_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--card--card_id--edit"
                    onclick="tryItOut('POSTapi-deck--deck_id--card--card_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--card--card_id--edit"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--card--card_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--card--card_id--edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/card/{card_id}/edit</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    <p>
                <b><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="card_id"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--edit"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the card.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>word</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="word"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--edit"
               value="culpa"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;
<small>image</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--edit"
               value="earum"
               data-component="body" hidden>
    <br>
<p>mimes:jpg,png,jpeg,gif,svg,webp</p>
        </p>
                <p>
            <b><code>audio</code></b>&nbsp;&nbsp;
<small>audio</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="audio"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--edit"
               value="eum"
               data-component="body" hidden>
    <br>
<p>mime:mimes:mp3,mpga,wav,ogg</p>
        </p>
        </form>

                    <h2 id="05card-GETapi-deck--deck_id--card--card_id--delete">Delete card</h2>

<p>
</p>



<span id="example-requests-GETapi-deck--deck_id--card--card_id--delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/deck/1/card/1/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/1/delete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-deck--deck_id--card--card_id--delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;msg&quot;: &quot;Deck delete&quot;,
    &quot;success&quot;: false
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-deck--deck_id--card--card_id--delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-deck--deck_id--card--card_id--delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-deck--deck_id--card--card_id--delete"></code></pre>
</span>
<span id="execution-error-GETapi-deck--deck_id--card--card_id--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-deck--deck_id--card--card_id--delete"></code></pre>
</span>
<form id="form-GETapi-deck--deck_id--card--card_id--delete" data-method="GET"
      data-path="api/deck/{deck_id}/card/{card_id}/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-deck--deck_id--card--card_id--delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-deck--deck_id--card--card_id--delete"
                    onclick="tryItOut('GETapi-deck--deck_id--card--card_id--delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-deck--deck_id--card--card_id--delete"
                    onclick="cancelTryOut('GETapi-deck--deck_id--card--card_id--delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-deck--deck_id--card--card_id--delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/deck/{deck_id}/card/{card_id}/delete</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="GETapi-deck--deck_id--card--card_id--delete"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    <p>
                <b><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="card_id"
               data-endpoint="GETapi-deck--deck_id--card--card_id--delete"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the card.</p>
            </p>
                    </form>

                    <h2 id="05card-POSTapi-deck--deck_id--card--card_id--hide">Hide card in a deck</h2>

<p>
</p>



<span id="example-requests-POSTapi-deck--deck_id--card--card_id--hide">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/deck/1/card/1/hide" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/deck/1/card/1/hide"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-deck--deck_id--card--card_id--hide">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;hidden&quot;: true,
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-deck--deck_id--card--card_id--hide" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-deck--deck_id--card--card_id--hide"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-deck--deck_id--card--card_id--hide"></code></pre>
</span>
<span id="execution-error-POSTapi-deck--deck_id--card--card_id--hide" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-deck--deck_id--card--card_id--hide"></code></pre>
</span>
<form id="form-POSTapi-deck--deck_id--card--card_id--hide" data-method="POST"
      data-path="api/deck/{deck_id}/card/{card_id}/hide"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-deck--deck_id--card--card_id--hide', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-deck--deck_id--card--card_id--hide"
                    onclick="tryItOut('POSTapi-deck--deck_id--card--card_id--hide');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-deck--deck_id--card--card_id--hide"
                    onclick="cancelTryOut('POSTapi-deck--deck_id--card--card_id--hide');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-deck--deck_id--card--card_id--hide" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/deck/{deck_id}/card/{card_id}/hide</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>deck_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="deck_id"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--hide"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the deck.</p>
            </p>
                    <p>
                <b><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="card_id"
               data-endpoint="POSTapi-deck--deck_id--card--card_id--hide"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the card.</p>
            </p>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
