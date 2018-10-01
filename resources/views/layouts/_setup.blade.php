@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">General Menu</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        {{-- {{dd(request()->is('company-types'))}}--}}
                        <li class="{{request()->is('admin/categories*') ? 'active':''}}"><a href="{{route('categories.index')}}"><i class="fa fa-stack fa-fw"></i> Categories</a></li>
                        <li class="{{request()->is('admin/statuses*') ? 'active':''}}"><a href="{{route('statuses.index')}}"><i class="fa fa-history fa-fw"></i> Statuses</a></li>
                        <li class="{{request()->is('admin/priorities*') ? 'active':''}}"><a href="{{route('priorities.index')}}"><i class="fa fa-sort fa-fw"></i> Priorities</a></li>
                        <li class="{{request()->is('admin/settings*') ? 'active':''}}"><a href="#"><i class="fa fa-cogs fa-fw"></i> Settings</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading text-center">User Management</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{request()->is('admin/agents*') ? 'active':''}}"><a href="{{route('agents.index')}}"><i class="fa fa-user fa-fw"></i> Agents</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-9 col-sm-12 well">
            @yield('page-content')
        </div>
    </div>


@endsection