
<style>
    .os-content-glue{

        display: none!important;
    }
    .os-viewport{

        overflow-x: hidden!important;
    }
    .os-content-arrange{

        display: none!important;
    }
    .sidebar{

    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Foottricks</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $user2['imageUri'] }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="../home/profile" class="d-block">{{ $user2['firstname'] }} {{ $user2['lastname'] }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="{{ route('calendar') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendar
                            @php
                            if (is_null($trainingsList)) {
                            $size = sizeof($matchesList);
                            } else if (is_null($matchesList)) {
                            $size = sizeof($trainingsList);
                            } else if (is_null($matchesList) && is_null($trainingsList)) {
                            $size = 0;
                            } else {
                            $size = sizeof($trainingsList) + sizeof($matchesList);
                            }

                            @endphp
                            <span class="badge badge-info right">{{$size}}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('chat')}}"  class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Chat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Team
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('showPlayers')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Player Stats</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('teamStats')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team Stats</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('presence')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Presence</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">

                    <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
