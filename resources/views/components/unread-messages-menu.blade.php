
<li role="presentation" class="nav-item dropdown open">
    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-envelope-o"></i>
    
    <span class="badge bg-green">{{ $unreadMessages->count()}}</span>
    </a>
    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
         @if ($unreadMessages->count() > 0 )
            @foreach ($unreadMessages as $msg)
                <li class="nav-item" >
                    <a class="dropdown-item" href="{{ route('showMessages', $msg->id) }}">
                    <span class="image"><img src="{{ asset('assets/admin/images/img.jpg') }}" alt="Profile Image" /></span>
                    <span>
                        <span>{{ $msg->firstName }} {{ $msg->lastName }}</span>
                        <span class="time">{{$msg->created_at->diffForHumans() }}</span>
                    </span>
                    <span class="message">
                        {{ Str::of($msg->content)->limit(20) }}
                    </span>
                    </a>
                </li>
            @endforeach
        @else
         <li class="nav-item" >
            <a class="dropdown-item" href="">
            <span class="message">No new messages...</span>
            </a>
        </li>
      @endif
      <li class="nav-item">
        <div class="text-center">
            <a class="dropdown-item">
               <a href="{{ route('markAsReadMessages') }}"><strong>See All Messages</strong></a> 
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </li>
    </ul>
</li>
