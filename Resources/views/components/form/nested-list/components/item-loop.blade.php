@foreach($list as $key=>$item)
    <li @if(isset($item['childable']) && $item['childable'])  data-module="c" @endif data-start="{{ $item['start'] }}"
        id="item_{{ $item['start'] }}">
        <div>{{ $item['title'] }}</div>
        @if( isset($item['children']) && count($item['children'])>0)
            <ul>
                @include('panel_ui::components.form.nested-list.components.item-loop',['list' => $item['children']])
            </ul>
        @endif
    </li>
@endforeach
