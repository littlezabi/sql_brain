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
        <div class="flex justify-center my-10 mx-3">
            <div style="width: 300px;" class="py-5 px-2 min-h-96 bg-color2 rounded-md border border-slate-700">
                <ul>
                    <li class="mx-5 font-medium mt-3"><a href="/admin"
                            class=" hover:bg-slate-800 {{ Request::is('admin') ? 'bg-slate-800' : 'bg-slate-900' }} transition-colors  w-full block rounded-md px-3 py-1">Dashboard</a>
                    </li>
                    <li class="mx-5 font-medium mt-3"><a href="/admin/posts"
                            class=" hover:bg-slate-800 {{ Request::is('admin/posts') ? 'bg-slate-800' : 'bg-slate-900' }} transition-colors  w-full block rounded-md px-3 py-1">Posts</a>
                    </li>
                    <li class="mx-5 font-medium mt-3"><a href="/admin/posts/new"
                            class=" hover:bg-slate-800 {{ Request::is('admin/posts/new') ? 'bg-slate-800' : 'bg-slate-900' }} transition-colors  w-full block rounded-md px-3 py-1">New
                            posts</a></li>

                    <li class="mx-5 font-medium mt-3"><a href="/admin/categories"
                            class="hover:bg-slate-800 {{ Request::is('admin/categories') ? 'bg-slate-800' : 'bg-slate-900' }} transition-colors  w-full block rounded-md px-3 py-1">Categories</a>
                    </li>
                    <li class="mx-5 font-medium mt-3"><a href="/admin/categories/new"
                            class=" hover:bg-slate-800 {{ Request::is('admin/categories/new') ? 'bg-slate-800' : 'bg-slate-900' }} transition-colors  w-full block rounded-md px-3 py-1">New
                            categories</a></li>
                </ul>

            </div>
            <div class="w-full h-full py-5 ml-2 px-2 min-h-96 bg-color2 rounded-md border border-slate-700">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('js/admin_main.js') }}"></script>

</html>
