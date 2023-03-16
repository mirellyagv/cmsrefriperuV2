<!-- Topbar Start -->
<div class="navbar-custom">
                    <div class="container-fluid">
                         <!-- LOGO -->
                         <div class="logo-box">

                            <a href="https://refriperu.com.pe/" target="_blank" class="logo text-center logo-dark"> 
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logoHorizRP.png') }}" alt="" height="70">  
                                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                                </span>
                                <span class="logo-sm">
                                    <!-- <span class="logo-lg-text-dark">A</span> -->
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="24">
                                </span>
                            </a>

                            <a href="https://refriperu.com.pe/" target="_blank" class="logo text-center logo-light">
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logoHorizRP.png') }}" alt="" height="70">
                                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                                </span>
                                <span class="logo-sm">
                                    <!-- <span class="logo-lg-text-dark">A</span> -->
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="24">
                                </span>
                            </a>
                        </div>
                        
                        <ul class="navigation-menu topnav-menu">
                            
                            <li class="has-submenu">
                                <a href="#"></a>
                            </li>

                            @if(RoleHelper::hasAnyRole(config('constants.roles_name.cliente')))
                                <li class="has-submenu">
                                <a href="{{url('cliente/perfil')}}"><i class="fe-user"></i>Perfil de cliente</a>
                                </li>
                            @endif

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-airplay"></i>Equipos</a>
                                <ul class="submenu">
                                    <li><a href="{{url('equipo')}}">Listado de equipos</a></li>
                                    <!--<li><a href="index.html">Agregar equipos</a></li>-->
                                    <li><a href="{{url('equipo/detalle')}}">Listado de ubicaciones</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-file-text"></i>Incidentes</a>
                                <ul class="submenu">
                                    <li><a href="{{url('incidencia')}}">Listado de incidentes</a></li>
                                    {{-- <li><a href="{{url('incidencia/crear')}}">Agregar incidente</a></li> --}}
                                    <li><a href="{{url('incidencia/resumen')}}">Resumen de incidentes</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-box"></i>Procesos</a>
                                <ul class="submenu">
                                    <li><a href="{{url('ciclo/procedure')}}">Cronograma de mantenimiento</a></li>
                                </ul>
                            </li>
                            
                        </ul>

                        <ul class="list-unstyled topnav-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
    
                            {{-- <li class="dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="lang-image" height="12"> 
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="lang-image" class="mr-1" height="12"> <span
                                            class="align-middle">German</span> 
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="lang-image" class="mr-1" height="12"> <span
                                            class="align-middle">Italian</span> 
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="lang-image" class="mr-1" height="12"> <span
                                            class="align-middle">Spanish</span> 
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="lang-image" class="mr-1" height="12"> <span
                                            class="align-middle">Russian</span> 
                                    </a>

                                </div>
                            </li> --}}
    
                            {{-- <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="badge badge-pink rounded-circle noti-icon-badge">8</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow m-0"><span class="float-right">
                                            <span class="badge badge-danger float-right">8</span>
                                            </span>Incidencias</h5>
                                    </div>

                                    <div class="slimscroll noti-scroll">

                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-settings-outline"></i>
                                            </div>
                                            <p class="notify-details">New settings
                                                <small class="text-muted">There are new settings available</small>
                                            </p>
                                        </a>
                
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning">
                                                <i class="mdi mdi-bell-outline"></i>
                                            </div>
                                            <p class="notify-details">Updates
                                                <small class="text-muted">There are 2 new updates available</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>   
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user
                                                <small class="text-muted">You have 10 unread messages</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-secondary">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all
                                        <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li> --}} 
                            
    
                            <li class="dropdown notification-list"> 
                                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets/images/users/admin-image.jpg') }}" alt="user-image" class="rounded-circle"> 
                                    <span class="pro-user-name ml-1">
                                        Bienvenido: {{ session('usuario') }} <i class="mdi mdi-chevron-down"></i> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a href="{{url('cliente/perfil')}}" class="dropdown-item notify-item">
                                        <i class="fe-user"></i>
                                        <span>Mi perfil</span>
                                    </a>

                                    <!-- item-->
                                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings"></i>
                                        <span>Herramientas</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-lock"></i>
                                        <span>Lock Screen</span>
                                    </a> --}}

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                        <i class="fe-log-out"></i>
                                        <span>Salir</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        </ul>
    
                       
    
                        {{-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                
                            <li class="d-none d-sm-block">
                                <form class="app-search">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul> --}}
                        <div class="clearfix"></div>
                    </div>
</div>
<!-- end Topbar -->

<div class="topbar-menu">
    @include('includes.sidebar')                    
</div>