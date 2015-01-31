
<html>
	<head>
        <meta charset="utf-8">
        <title>@section('title')@show</title>
        {{ HTML::style('css/bootstrap.css'); }}
        {{ HTML::style('css/style.css'); }}
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body ng-app="app">
        <div class="header">
            {{ HTML::image('images/headertec.jpg') }}
            @if (Auth::check())
                <!-- Navigation bar -->
                <nav class="navbar navbar-inverse navbar-static-top margin-0" role="navigation">
                  <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle border-primary" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="glyphicon glyphicon-tasks"></span>
                      </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="home.html"><span class="glyphicon glyphicon-home"></span></a>
                            </li>

                            @foreach ( DB::table('pages')->where('navbar', '1')->get() as $page)
                                @if(Auth::user()->hasAccess($page->descripcion))
                                    <li>
                                        <a href='{{$page->descripcion}}'>
                                            <strong>{{$page->descripcion}}</strong>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="configuracion.html">Cambiar contraseña</a></li>
                                    <li><a  data-toggle="modal" data-target="#sesión">Cerrar sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                  </div>
                </nav>
            @endif
        </div>
        <div class="container content">
            @yield('content')
        </div>
    <script src="https://code.jquery.com/jquery.js"></script>
    {{ HTML::script('js/bootstrap.js'); }}
    {{ HTML::script('js/angular.min.js'); }}
    {{ HTML::script('js/app.js'); }}

    <!--IMPORT SMART TABLE-->
    {{ HTML::script('js/smart-table/smart-table.module.js'); }}
    {{ HTML::script('js/smart-table/stPagination.js'); }}
    {{ HTML::script('js/smart-table/stPipe.js'); }}
    {{ HTML::script('js/smart-table/stSearch.js'); }}
    {{ HTML::script('js/smart-table/stSelectRow.js'); }}
    {{ HTML::script('js/smart-table/stSort.js'); }}
    {{ HTML::script('js/smart-table/stTable.js'); }}
    <!-- END IMPORT SAMRT TABLE -->

    </body>
</html>