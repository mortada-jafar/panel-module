<div class="intro-y  col-span-12 lg:col-span-{{$col}}
@if(!$transparent) box @endif

    ">
    @if($title)
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 col-span-12">
            <h2 class="font-medium text-base me-auto">
                {{$title}}
            </h2>
        </div>
    @endif
    <form id="{{ $uuid }}" method="POST" enctype="multipart/form-data" action="{{ $action}}">
        <div
            @if($isFlex)
            class="flex flex-row p-5 items-center"
            @else
            class="grid grid-cols-12 p-5 gap-{{$gap}}"
            @endif
        >

            @csrf
            @foreach($elements as $element)
                {!! $element->render() !!}
            @endforeach
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $.validator.addMethod(
            "regex",
            function (start, element, regexp) {

                regexp = regexp.substring(1, regexp.length - 1);
                var re = new RegExp(regexp);

                return this.optional(element) || re.test(start);
            },
            "Please check your input."
        )

        $.validator && $.validator.setDefaults({
            ignore: ":hidden",
            validClass: "",
            onkeyup: function (element) {
                var parent = $(element).closest('.label-field');
                if ($(element).valid()) {
                    $(element).removeClass('invalid');
                    parent.removeClass('has-error');
                    // parent.next('label.error').remove();
                    // parent.find('label.error').remove();
                } else {
                    $(element).addClass('invalid');
                    parent.addClass('has-error');
                }
            },
            highlight: function (element) {
                $(element).closest('.label-field').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.label-field').removeClass('has-error');
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                var parent = $(element).closest('.label-field');
                console.log(parent)
                parent.addClass('has-error');
                element.addClass('invalid');
                error.appendTo(parent);
            }

        });
        @if($rules)
        const rules ={!! json_encode($rules) !!};
        $('#{{$uuid}}').validate({rules: rules});
        @endif

    </script>

@endpush
