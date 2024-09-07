<x-admin_layout>
    <x-slot:pageTitle>NEW Post</x-slot:pageTitle>
    <div class="m-3">
        <a href="/admin/" class="bg-blue-500 text-white rounded-sm px-3 py-1  hover:bg-blue-700">dashboard</a>
    </div>
    <div class="flex justify-center items-center">
        <form action="/admin/posts/new" method="POST" class="border bg-slate-900 rounded-md p-5 flex flex-col">
            @csrf
            <h1 class="text-xl">New Post</h1>
            <input type="text" class="mt-1 w-96 px-3 m-1 py-1 rounded bg-slate-700" name="title"
                placeholder="title here">

            @error('title')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror
            <textarea name="body" class="mt-1 w-96 px-3 m-1 py-1 rounded bg-slate-700" id=""
                placeholder="you post body"></textarea>

            @error('body')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror
            <textarea name="default_sql" class="mt-1 w-96 px-3 m-1 py-1 rounded bg-slate-700" id=""
                placeholder="you default sql query"></textarea>
            <div class="my-2">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400 text-xs font-bold mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button type="submit"
                class="bg-blue-500 w-28 mt-5 text-white rounded-sm px-3 py-1  hover:bg-blue-700">Save</button>
        </form>
    </div>
</x-admin_layout>
