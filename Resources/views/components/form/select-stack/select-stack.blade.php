<div class="label-field  sm:col-span-{{$col}}   col-span-12  @if(isset($required)) required @endif"
     id="{{$name}}-parent">
    <label for="{{ $name }}">{{ $label }} </label>
    <div class="dropdown relative mx-2">
        <input class="dropdown-toggle input w-full" id="{{$name}}-view" readonly autocomplete="false"
               @if(isset($start)) start="{{$start['start']}}" @endif />
        <input type="hidden" id="{{$name}}" name="{{$name}}"
               @if(isset($start))
               start='{{$start['key']}}'
            @endif
        />
        <div class="dropdown-box mt-6 absolute w-64 top-0 z-30">
            <div class="dropdown-box__content box">
                <div id="stack-menu">
                    <ul>
                        @include('panel_ui::components.form.select-stack.components.item-loop',['list'=>$list])
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#stack-menu').stackMenu({
                callback: function (selected) {
                    $('.dropdown-box').removeClass('show')
                    $("#{{ $name }}-view").val($(selected).children('.stack-menu__link').text())
                    $("#{{$name}}").val($(selected).data('start'))
                }
            });
        });
    </script>

@endpush
