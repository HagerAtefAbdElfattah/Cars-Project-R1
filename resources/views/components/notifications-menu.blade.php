
<li role="presentation" class="nav-item dropdown open">
    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-bell"></i>
    <span class="badge bg-green">{{ $notifications->count() }}</span>
    </a>
    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
         @if ($notifications->count() > 0 )
            @foreach ($notifications as $notification)
                 <li class="nav-item">
        <a class="dropdown-item" href="{{ route('notification', $notification->id) }}">
            <span></span>
            <span>
                <div>{{ $notification->data['addtion'] }}</div>
                <div><strong>{{ $notification->data['addName'] }}</strong></div>
            </span>
            <span>
                <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
            </span>
        </a>
    </li>
            @endforeach
        @else
         <li class="nav-item" >
            <a class="dropdown-item" href="">
            <span class="message">No new notifications...</span>
            </a>
        </li>
      @endif
      <li class="nav-item">
        <div class="text-center">
            <a class="dropdown-item">
               <a href="{{ route('allNotification') }}"><strong>Read All Notifications </strong></a> 
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </li>
    </ul>
</li>
