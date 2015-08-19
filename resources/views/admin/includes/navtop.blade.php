<ul class="nav navbar-top-links navbar-right">
      
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </li>
                {{-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li> --}}
                
                <li class="divider"></li>
                <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>