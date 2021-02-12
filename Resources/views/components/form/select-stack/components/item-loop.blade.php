@foreach($list as $key=>$item)
    <li data-start="{{ $item['start'] }}" >
        <a href="#">{{ $item['title'] }}</a>

        <button class="select-btn button text-black bg-theme-white border-2 border-black shadow-md p-1">انتخاب</button>
        @if( isset($item['children']) && count($item['children'])>0)
            <ul>
                @include('panel_ui::components.form.select-stack.components.item-loop',['list' => $item['children']])
            </ul>
        @endif

    </li>
@endforeach
