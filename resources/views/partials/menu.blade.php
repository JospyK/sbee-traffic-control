<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background-color: #ca0000;">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>
    <span class="divider py-0 my-0">
        <hr class="divider py-0 my-0"></span>
    <div class="c-sidebar-brand d-md-down-none">
        <a class="text-white" href="{{route('admin.users.show', Auth::id())}}" style="text-decoration: none;">
            {{ Auth::user()->name }}
        </a>
        <small class="px-1"> <i class="px-1">|</i> {{ Auth::user()->roles()->first()->title }} </small>
    </div>

    <ul class="c-sidebar-nav">
        {{-- <li>
            <select class="searchable-field form-control">

            </select>
        </li> --}}
        @can('dashboard_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @endcan
        @can('user_management_access')
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                {{ trans('cruds.userManagement.title') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @can('user_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.users.index") }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                        {{ trans('cruds.user.title') }}
                    </a>
                </li>
                @endcan
                @can('role_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.roles.index") }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                        {{ trans('cruds.role.title') }}
                    </a>
                </li>
                @endcan
                @can('permission_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.permissions.index") }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon"></i>
                        {{ trans('cruds.permission.title') }}
                    </a>
                </li>
                @endcan
                @can('audit_log_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.audit-logs.index") }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon"></i>
                        {{ trans('cruds.auditLog.title') }}
                    </a>
                </li>
                @endcan
                @can('team_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.teams.index") }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                        {{ trans('cruds.team.title') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('agents_present_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.agents-presents.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/agents-presents') || request()->is('admin/agents-presents/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"></i>
                {{ trans('cruds.agentsPresent.title') }}
            </a>
        </li>
        @endcan
        @can('retard_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.retards.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/retards') || request()->is('admin/retards/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"></i>
                {{ trans('cruds.retard.title') }}
            </a>
        </li>
        @endcan
        @can('traffic_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.traffic.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/traffic') || request()->is('admin/traffic/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"></i>
                {{ trans('cruds.traffic.title') }}
            </a>
        </li>
        @endcan

        @can('horaire_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.horaires.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/horaires') || request()->is('admin/horaires/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"></i>
                {{ trans('cruds.horaire.title') }}
            </a>
        </li>
        @endcan

        @can('horaire_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.etats.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/etats') || request()->is('admin/etats/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon"></i>
                Etats
            </a>
        </li>
        @endcan

        @can('user_alert_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.user-alerts.index") }}"
                class="c-sidebar-nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-bell c-sidebar-nav-icon"></i>
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
        @can('profile_password_edit')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                href="{{ route('profile.password.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.change_password') }}
            </a>
        </li>
        @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); confirm('Voulez vous vous deconnecter?') ? document.getElementById('logoutform').submit() : '';">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>
</div>
