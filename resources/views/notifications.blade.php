<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-bell-o"></i>
      <span class="label label-danger">{{ count($notifs) }}</span>
    </a>
    <ul class="dropdown-menu">
        @if(count($notifs) == 0)
            <li class="header">You don't have notifications</li>
        @else
            <li class="header">You have {{ count($notifs) }} notifications</li>
        @endif
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach($notifs as $notif)
                    <li>
                        <a href="https://majdi.org/taskrodud/public/admin/requests">
                            {{ $notif['text'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
