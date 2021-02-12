@if($isYou)
    <div class="chat__box__text-box flex items-end float-bottom mb-4">
        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative me-5">
            <img alt="{{$user['name']}}" class="rounded-full" src="{{$user['image']}}">
        </div>
        <div class="bg-gray-200 py-3 text-gray-700 rounded-r-md rounded-t-md">
            <span class=" m-2 font-weight-bold text-center rounded px-2 mt-1  ">{{$user['name']}}</span>
            <div style="height: 2px; background-color: #ccc" class="my-3"></div>
            <p class="px-4">{{ $message }}</p>
            <div style="height: 2px; background-color: #ccc" class="my-3"></div>
            @foreach($attaches as $attache)
                <a href="{{ $attache }}">پیوست</a>
            @endforeach
            <div class="px-4 mt-2 text-xs text-gray-600 ">{{ $created_at }}</div>
        </div>
    </div>
@else
    <div class="chat__box__text-box flex items-end float-end mb-4">
        <div style="background-color: #00baba;" class="  py-3 text-white rounded-l-md rounded-t-md">
            <span class=" m-2 font-weight-bold text-center rounded px-2 mt-1  ">{{$user['name']}}</span>
            <div style="height: 2px; background-color: #ccc" class="my-3"></div>
            <p class="px-4">{{ $message }}</p>

            @if(count($attaches)>0)
          <div class="mx-8 mt-5">
            <ol class=" list-disc	">
            @foreach($attaches as $attache)
                <li><a  target="_blank" href="{{ $attache }}">پیوست  {{ $loop->index +1 }}</a></li>
            @endforeach
            </ol>
          </div>
            @endif
            <div class="px-4 mt-2 text-xs ">{{ $created_at }}</div>
        </div>
        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ms-5">
            <img alt="{{$user['name']}}" class="rounded-full" src="{{$user['image']}}">
        </div>
    </div>
    <div class="clear-both"></div>
@endif
<div class="clear-both"></div>


