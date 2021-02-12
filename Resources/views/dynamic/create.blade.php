@extends('panel_ui::layout.' . $layout)
@section('title', $form->title)


@section('subcontent')
    <form id="form-validate" autocomplete="off" method="POST" enctype="multipart/form-data"
          action="{{ $form->action() }}">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium me-auto">
                {{ $form->title }}
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <div class="dropdown relative">
                    <button
                        class="dropdown-toggle button text-white bg-theme-primary shadow-md flex items-center">@lang('panel_ui::panel.save')</button>
                </div>
            </div>
        </div>
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($form->columns() as $column)
                {!! $column->render() !!}
            @endforeach
        </div>
    </form>
    @push('scripts')
        <script>
            @if(isset($form) && optional($form)->rules())
                const rules ={!! json_encode($form->rules()) !!};
                $('#form-validate').validate({rules: rules});
            @endif

            @if ( method_exists($form, 'scripts') )
                {!! $form->scripts() !!}
            @endif

        </script>

    @endpush

@endsection
