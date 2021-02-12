<span>
    @if(isset($editUrl)) <a id='{{ $editUrl }}' href="{{ $editUrl }}" class="btn-floating waves-light btn-small indigo darken-2"><i
            class="material-icons white-text small">edit</i></a>@endif
        @if(isset($showUrl)) <a id='{{ $showUrl }}' href="{{ $showUrl }}" class="btn-floating waves-light btn-small indigo darken-2"><i
                class="material-icons white-text small">visibility</i></a>@endif
        @if(isset($deleteUrl))<a class="delete btn-floating waves-light btn-small red darken-1" user-url="{{$deleteUrl}}" href="#!"><i
            class="material-icons white-text small">delete</i></a>@endif
</span>
{{--<span class='dropdown-trigger' user-target='{{$editUrl}}'>--}}
{{--        <i class="material-icons">more_vert</i>--}}
{{--</span>--}}

{{--<!-- Dropdown Structure -->--}}
{{--<ul id='{{ $editUrl }}' class='dropdown-content'>--}}
{{--    <li>--}}
{{--        <a href="{{ $editUrl }}">--}}
{{--            <i class="material-icons">edit</i>--}}
{{--            @lang('admin.edit')--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <a class="delete" user-url="{{$deleteUrl}}" href="#!">--}}
{{--            <i class="material-icons">delete</i>--}}
{{--            @lang('admin.delete')--}}
{{--        </a>--}}
{{--    </li>--}}
{{--</ul>--}}
