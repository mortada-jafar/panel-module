<div class="label-field  sm:col-span-{{$col}}   col-span-12 {{$class}}  @if(isset($required)) required @endif"
     id="{{$name}}-parent" @if(isset($is_hidden) && $is_hidden) style="display: none" @endif >
    <label for="{{ $name }}">{{ $label }} </label>
    <div class="sm:col-span-{{$col}}   col-span-12  @if(isset($required)) required @endif">
        <input type="file" name="{{ $name }}"
               class="file-up"
               data-fileuploader-limit="{{ $count }}"
               data-fileuploader-maxFile="2"
               data-fileuploader-extensions="{{ $extensions }}"
               @if(isset($value))

               data-fileuploader-files='[
           @foreach($value as $val)
                   {"name":"{{\Illuminate\Support\Facades\File::name($val)}}","size":{{\Illuminate\Support\Facades\File::size(public_path($val))}},"type":"{{\Illuminate\Support\Facades\File::mimeType(public_path($val))}}","file":"{{ asset($val) }}"}
               @if(!$loop->last)
                   ,
@endif
               @endforeach
                   ]' @endif

        />
    </div>
</div>

@push('styles')
    <style>
        .fileuploader {
            padding: 0;
            margin: 0;
            background: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        {{--$(document).ready(function () {--}}
        {{--    // enable fileuploader plugin--}}
        {{--    $('input[name="{{ $name }}"]').fileuploader({--}}
        {{--        captions: '{{app()->getLocale() }}',--}}
        {{--        itemPrepend: false,--}}
        {{--        addMore: true,--}}
        {{--    });--}}

        {{--});--}}
    </script>
@endpush
