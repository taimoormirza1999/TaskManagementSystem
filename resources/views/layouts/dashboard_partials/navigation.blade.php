<!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">

                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            @if(Auth::user()->roles->pluck('name')->first() == 'admin')
                            <li class="nav-item ">
                                <a class="nav-link active" ><i class=" fas fa-sliders-h"></i>Dashboard <span class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('users.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-users"></i>Manage Users <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu show" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('users.index') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">View Users</a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('users.create') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Create User</a>

                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('templates.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fab fa-fw fa-wpforms"></i>Manage Templates <span class="badge badge-success">6</span></a>
                                <div id="submenu-2" class="collapse submenu show" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('templates.index') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">View Templates</a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('templates.create') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Add Template</a>

                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('projects.index') }}#" data-toggle="collapse" aria-expanded="true" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-table"></i>Manage Project Tasks<span class="badge badge-success">6</span></a>
                                <div id="submenu-3" class="collapse submenu show" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('projects.index') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">View Project Tasks</a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('projects.create') }}"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Add Project Task</a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('projects.index') }}#"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Assign Project Task</a>

                                        </li>

                                    </ul>
                                </div>
                            </li>


                            @elseif(Auth::user()->roles->pluck('name')->first() == 'user')
                            <li class="nav-item ">
                                <a class="nav-link active" ><i class="fa fa-fw fa-rocket"></i>Task Board <span class="badge badge-success">6</span></a>

                            </li>

                            @endif





                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
