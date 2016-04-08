<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href={{ URL::route('index') }}>CheckIt</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{{ (Route::is('index') ? 'class=active' : '') }}}><a href="{{ URL::route('index') }}">Home<span class="sr-only">(current)</span></a></li>
        <li {{{ (Route::is('post-page') ? 'class=active' : '') }}}><a href="{{ URL::route('post-page') }}">Create Post</a></li>
        <li {{{ (Route::is('favorites-show') ? 'class=active' : '') }}}><a href="{{ URL::route('favorites-show') }}">Favorites</a></li>
        @if(Auth::check())
        <li {{{ (Route::is('account-page') ? 'class=active' : '') }}}><a href="{{ URL::route('account-page', ['username' => Auth::user()->name]) }}">Account</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
        <li><a href="{{ URL::route('logout') }}">Logout: {{Auth::user()->name }}</a></li>
      @else
      	<li><a href="{{ URL::route('login') }}">Login</a></li>
      	<li><a href="{{ URL::route('register') }}">Register</a></li>
      @endif
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>