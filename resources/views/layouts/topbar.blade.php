    <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
            </button>


            <div class="navbar-right ">
                <div class="search-form">
                    <form action="index.html" method="get">
                        <div class="input-group input-group-sm" id="input-group-search">
                            <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>
                </div>

                <ul class="nav navbar-nav">
                    <!-- User Account -->
                    <li class="dropdown user-menu">
                        <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <img src="{{ asset('theme/images/user/user-xs-01.jpg')}}" class="user-image rounded-circle" alt="User Image" />
                            <span class="d-none d-lg-inline-block">{{ Auth::user()->name}}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-link-item" href="/logout">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span class="nav-text">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>