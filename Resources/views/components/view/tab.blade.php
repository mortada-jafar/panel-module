<div class="tab-content__pane p-5 grid grid-cols-12 @if($isActive) active @endif "
    id="{{ $id }}">
    @foreach($elements as $element)
        {!! $element->render() !!}
    @endforeach
</div>
