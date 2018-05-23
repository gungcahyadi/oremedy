<li class="nav-item @if(\Request::segment(1) == 'admin' && \Request::segment(2) == null) active open @endif">
    <a href="{{ route('admin.index') }}" class="nav-link">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item @if(\Request::segment(1) == 'admin' && (\Request::segment(2) == 'email' || \Request::segment(2) == 'def-social-link')) active open @endif">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-link"></i>
        <span class="title">Web Connection</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item @if(\Request::segment(2) == 'email') active open @endif">
            <a href="{{ route('email.index') }}" class="nav-link ">
                <span class="title">Manage Inbox Email</span>
            </a>
        </li>
        <li class="nav-item @if(\Request::segment(2) == 'social') active open @endif">
            <a href="{{ route('social-link.index') }}" class="nav-link ">
                <span class="title">Manage Social Link</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item @if(\Request::segment(1) == 'admin' && (\Request::segment(2) == 'menu-utama' || \Request::segment(2) == 'config' || \Request::segment(2) == 'web-config' || \Request::segment(2) == 'filemanager')) active open @endif">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-settings"></i>
        <span class="title">Web Configuration</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item  @if(\Request::segment(2) == 'menu-utama' || \Request::segment(2) == 'config') active open @endif">
            <a href="{{ route('menu-utama.index') }}" class="nav-link ">
                <span class="title">Manage Main Menu</span>
            </a>
        </li>
        <li class="nav-item @if(\Request::segment(2) == 'web-config') active open @endif">
            <a href="{{ route('web-config.index') }}" class="nav-link ">
                <span class="title">Other Setting</span>
            </a>
        </li>
        <li class="nav-item @if(\Request::segment(2) == 'filemanager') active open @endif">
            <a href="{{ route('filemanager.index') }}" class="nav-link ">
                <span class="title">File Manager</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item @if(\Request::segment(1) == 'admin' && \Request::segment(2) == 'user') active open @endif">
    <a href="{{ route('user.index') }}" class="nav-link">
        <i class="icon-users"></i>
        <span class="title">Manage Admin</span>
    </a>
</li>
<li class="nav-item @if(\Request::segment(1) == 'admin' && \Request::segment(2) == 'contact-messages') active open @endif">
    <a href="{{ route('contact-messages.index') }}" class="nav-link">
        <i class="icon-envelope"></i>
        <span class="title">Contact Messages</span>
    </a>
</li>
