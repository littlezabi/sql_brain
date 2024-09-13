<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{--
        <script src="http://cdn.tailwindcss.com"></script>
        --}}
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <title>{{ $pageTitle }} | SQL Brain</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/monokai.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/ayu-mirage.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/sql/sql.min.js"></script>
    {{-- <script>
        const Categories = @json($cats_all);
    </script> --}}
</head>
<x-headers />

<body class="text-white">
    <x-search />
    <div style="max-width: 1280px;margin:auto;position:relative" class="relative">
        {{ $slot }}
    </div>
</body>
<x-footer />
<script src="{{ asset('js/main.js') }}"></script>

</html>
