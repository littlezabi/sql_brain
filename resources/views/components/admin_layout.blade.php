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
    <title>{{ $pageTitle }} | Admin</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/monokai.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/sql/sql.min.js"></script> --}}

</head>
<x-admin_header />

<body class="text-white bg-slate-800">
    <div style="max-width: 1280px;margin:auto">
        {{ $slot }}
    </div>
</body>

<script src="{{ asset('js/admin_main.js') }}"></script>

</html>
