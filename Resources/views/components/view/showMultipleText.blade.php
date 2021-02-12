<div class="article">
    <h3 class="article__h3">
        {{ $title }}
    </h3>
    @foreach($data as $d)
        <p class="article__p">
            @if(isset($d->link))
                @component('common.partials.link', [
                    'text' => $d->text,
                    'link' => $d->link,
                    'class' => 'blue-text right'
                ])
                @endcomponent
            @else
                {{$d->text}}
            @endif
        </p>
    @endforeach
</div>