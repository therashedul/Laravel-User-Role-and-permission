     {{-- {{ $menus }} --}}
     <div class="col-md-3 left_col">
         <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
                 <a href="index.html" class="site_title"><span>Dashaboard</span></a>
             </div>

             <div class="clearfix"></div>
             <br />

             <!-- sidebar menu -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                 <div class="menu_section">

                     <ul class="nav side-menu">
                         @php
                             $rhps = DB::table('role_has_permissions')->get();
                             $permissions = DB::table('permissions')->get();
                             $roles = DB::table('roles')->get();
                         @endphp
                         @foreach ($roles as $role)
                             @foreach ($rhps as $rhp)
                                 @foreach ($permissions as $permission)
                                     @if ($role->id == Auth::user()->role_id && $role->id == $rhp->role_id)
                                         @if ($rhp->permission_id == $permission->id)
                                             @php
                                                 $name = $permission->name;
                                             @endphp
                                             @if (stristr($name, 'menu'))
                                                 {{ $role_id = Auth::user()->role_id }}
                                                 @php
                                                     $value = substr(strstr($name, '-'), 1);
                                                     echo $value;
                                                     $roles = DB::table('roles')
                                                         ->where('id', $role_id)
                                                         ->get();
                                                     print_r($roles[0]->id);
                                                 @endphp
                                                 <li>
                                                     @if ($value == 'users')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                     @elseif ($value == 'roles')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                     @elseif ($value == 'permissions')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                         {{-- @elseif ($value == 'projects')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                         @elseif ($value == 'media')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                     @elseif ($value == 'documents')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                     @elseif ($value == 'tasks')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a>
                                                     @elseif ($value == 'dailyTask')
                                                         <a class="btn btn-primary"
                                                             href="{{ route(Auth::user()->name . '.' . $value) }}"
                                                             style="text-transform: uppercase;">{{ $value }}</a> --}}
                                                     @else
                                                     @endif
                                                 </li>
                                             @endif
                                         @endif
                                     @endif
                                 @endforeach
                             @endforeach
                         @endforeach
                     </ul>
                 </div>
             </div>
             <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
             <div class="sidebar-footer hidden-small">
                 <a data-toggle="tooltip" data-placement="top" title="Settings">
                     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                     <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="Lock">
                     <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                 </a>
             </div>
             <!-- /menu footer buttons -->
         </div>
     </div>
