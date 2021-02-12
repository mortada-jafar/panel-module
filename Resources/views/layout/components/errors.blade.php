@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $.toast({
                text: '{{$error}}',
                classes: 'rounded'
            })
        </script>
    @endforeach
@endif

