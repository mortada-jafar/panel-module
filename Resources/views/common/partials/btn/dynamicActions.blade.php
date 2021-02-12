<span class='dropdown-trigger' user-target='{{$id}}'>
        <i class="material-icons">more_vert</i>
</span>

<!-- Dropdown Structure -->
<ul id='{{$id}}' class='dropdown-content'>
    @foreach($buttons as $button)
        <li style="min-height: 10px !important;">
            <a href="{{$button['link']}}" style="padding: 10px 15px !important;">
                <i class="material-icons" style="margin: 0 0 0 15px !important;">{{$button['icon']}}</i>
                <span style="padding: 0">{{$button['name']}}</span>
            </a>
        </li>
    @endforeach
    @if ( isset($delete) )
        <li style="min-height: 10px !important;">
            <a class="delete" user-url="{{$delete['link']}}" href="#!" style="padding: 10px 15px !important;">
                <i class="material-icons" style="margin: 0 0 0 15px !important;">delete</i>
                <span style="padding: 0">{{$delete['name']}}</span>
            </a>
        </li>
    @endif
</ul>
