<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>
<table>
    <thead>
    <tr>
        @foreach ($columns as $column)
            @if($column->printable)
                <th>{{ $column->label }}</th>
            @endif
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach ($records as $record)
        <tr>
            @foreach ($columns as $column)
                <td class="w-40">
                    @include('panel_ui::components.table.'.$column->getWrapper(),[
                        'data'=>$record,
                        'column'=>$column,
                    ])
                </td>
            @endforeach
        </tr>

    @endforeach
    </tbody>
</table>

</body>
</html>
