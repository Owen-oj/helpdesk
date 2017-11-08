@if(auth()->check())
<div class="">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills">
                    {{--<li>{{config('app.name')}}
                    </li>--}}
                    <li role="presentation" class=""><a href="{{route('tickets.index')}}">Active Tickets</a></li>
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
                </ul>
            </div>
        </div>
    </div>

@endif