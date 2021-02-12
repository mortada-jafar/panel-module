<div class="  col-span-12 ">
        <!-- BEGIN: Chat Active -->
        <div class=" h-full flex flex-col">
            <div class="overflow-y-scroll px-5 pt-5 flex-1">
                @foreach($messages as $message)
                    {!! $message->render() !!}
                @endforeach
            </div>
        </div>
</div>
