<x-admin_layout>
    <x-slot:pageTitle>{{ $category->title }}</x-slot:pageTitle>
    <div class="w-full flex mt-10">
        <form action="/admin/categories/{{ $category->id }}" method="POST" class="w-full flex flex-col">
            @csrf
            @method('PATCH')
            <input type="hidden" id="hidden_slug" name="old_slug" value="{{ $category->slug }}">
            <h1 class="text-2xl mt-2 mb-4 font-bold uppercase ">Edit category</h1>
            <label for="body" class="mt-4 block text-sm">Category title</label>
            <input type="text"
                class="mt-1 w-full px-3 m-1 py-1 border-b outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                style="width: 480px" name="title" placeholder="title here" id="category_title"
                value="{{ $category->title }}">

            @error('title')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror
            <label for="body" class="mt-4 block text-sm">Descriptive text of category</label>
            <textarea name="description" id="body"
                class="mt-1 w-full px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                style="width: 480px" placeholder="you post body">{{ $category->description }}</textarea>

            @error('body')
                <p class="text-red-400 text-sm bold">{{ $message }}</p>
            @enderror

            <label for="slug" class="mt-4 block text-sm">Enter Slug</label>
            <input type="text" id="slug" style="width: 480px" name="slug"
                class="mt-1 w-full px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 "
                value="{{ $category->slug }}" placeholder="Enter slug of the category" />

            <span id='slug_msg' class="text-sm text-red-400 font-semibold hidden">hello world</span>
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
                    <a href="/admin/categories" class="font-semibold mr-8 mt-4 text-white hover:underline">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 mt-5 rounded-md text-white px-16 py-2  hover:bg-blue-700 transition">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-admin_layout>
