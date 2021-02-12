@extends('panel_ui::layout.' . $layout)
@section('title', $form->title)

@section('subcontent')
    <form id="form-validate" method="POST" enctype="multipart/form-data" action="{{ $form->action() }}">

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium me-auto">
                {{ $form->title }}
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <div class="dropdown relative">
                    <button
                        class="dropdown-toggle button text-white bg-theme-primary shadow-md flex items-center">@lang('panel_ui::panel.update')</button>
                </div>
            </div>
        </div>
        @csrf
        @method('put')
        <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($form->columns() as $column)
                {!! $column->render() !!}
            @endforeach
        </div>
    </form>
    @push('scripts')
        <script>
            $.validator.addMethod(
                "regex",
                function (start, element, regexp) {

                    regexp = regexp.substring(1, regexp.length - 1);
                    console.log(regexp)
                    var re = new RegExp(regexp);

                    return this.optional(element) || re.test(start);
                },
                "Please check your input."
            )

            $.validator && $.validator.setDefaults({
                ignore: "",
                validClass: "",
                onkeyup: function (element) {
                    console.log(element)
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
            @if(isset($form) && optional($form)->rules())
            const rules ={!! json_encode($form->rules()) !!};
            console.log(rules);
            $('#form-validate').validate({rules: rules});
            @endif

        </script>
    @endpush
    @if ( method_exists($form, 'scripts') )
        {!! $form->scripts() !!}
    @endif
@endsection
