<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{config('app.name')}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li role="presentation" class="">
                        <a href="{{route('tickets.index')}}">Active Tickets <span class="badge">{{$active_tickets_count}}</span></a>
                    </li>
                    <li role="presentation"><a href="{{route('tickets.complete')}}">Completed Tickets</a></li>
                    <li role="presentation"><a href="{{route('solutions.index')}}">Knowledge Base</a></li>
                    @role((['manager','admin']))
                    <li role="presentation"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    @endrole
                    @role(('admin'))
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Settings<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a href="{{route('categories.index')}}">Categories</a></li>
                            <li role="presentation"><a href="{{route('statuses.index')}}">Statuses</a></li>
                            <li role="presentation"><a href="{{route('priorities.index')}}">Priorities</a></li>
                            <li role="presentation"><a href="{{route('agents.index')}}">Agents</a></li>
                        </ul>
                    </li>
                    @endrole
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>