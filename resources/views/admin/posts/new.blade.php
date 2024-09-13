<x-admin_layout>
    <x-slot:pageTitle>New Post</x-slot:pageTitle>
    <div class="w-full flex mt-10">
        <form action="/admin/posts/new" method="POST" class="w-full flex flex-col">
            @csrf
            <h1 class="text-2xl mt-2 mb-4 font-bold uppercase ">New post</h1>
            <label for="body" class="mt-4 block text-sm">Title</label>
            <input type="text"
                class="mt-1 w-full px-3 m-1 py-1 border-b outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                style="width: 480px" name="title" placeholder="title here">

            @error('title')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror
            <label for="body" class="mt-4 block text-sm">Descriptive text</label>
            <textarea name="body" id="body"
                class="mt-1 w-full px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                style="width: 480px" placeholder="you post body"></textarea>

            @error('body')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror

            <label for="body" class="mt-4 block text-sm">Enter default SQL (optional)</label>
            <textarea name="default_sql" id="defualt_sql" style="width: 480px"
                class="mt-1 w-full px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                placeholder="you default sql query"></textarea>
            <label for="body" class="mt-4 block text-sm">Select category</label>
            <select style="width: 480px" name="category"
                class="mt-1 w-full cursor-pointer px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 ">
                <option value="" selected disabled>Select a category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" placeholder="Enter slug of the category">
                        {{ $cat->title }}
                    </option>
                @endforeach
            </select>

            <div class="my-2">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400 text-xs font-bold mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <x-message />
            <div class="w-full border-b border-slate-700 mt-4"></div>
            <div class="flex ">

                <div class=" flex justify-end items-center w-full">
                    <a href="/admin/posts" class="font-semibold mr-8 mt-4 text-white hover:underline">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 mt-5 rounded-md text-white px-16 py-2  hover:bg-blue-700 transition">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-admin_layout>
