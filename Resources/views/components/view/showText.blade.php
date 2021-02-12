<div class="article">
    <h3 class="article__h3">
            {{ $title }}
    </h3>
        <p class="article__p">
            @if(isset($link))
                @component('common.partials.link', [
                    'text' => $text,
                    'link' => $link,
                    'class' => 'blue-text right'
                ])
                @endcomponent
            @else
                {{$text}}
            @endif
        </p>
</div>