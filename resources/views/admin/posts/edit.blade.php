<x-admin_layout>
    <x-slot:pageTitle>{{ $post->title }}</x-slot:pageTitle>

    <div class="w-full flex mt-10">
        <form action="/admin/posts/{{ $post->id }}" method="POST" class="w-full flex flex-col">
            @csrf
            @method('PATCH')
            <h1 class="text-2xl mt-2 mb-4 font-bold uppercase ">Edit post</h1>

            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <x-form-field for="title" title="Your title text" placeholder="e.g. Introduction to MySQL"
                value="{{ $post->title }}" />
            <x-form-field style="width: 480px;height:300px" type='textarea' for="body" title="Descriptive text"
                value="{{ $post->body }}" placeholder="Your post body" />

            <x-form-field style="width: 480px" type="select" for="category" title="Select category">
                @foreach ($categories as $cat)
                    @if ($post->categories_id == $cat->id)
                        <option selected value="{{ $cat->id }}">
                            {{ $cat->title }}
                        </option>
                    @else
                        <option value="{{ $cat->id }}">
                            {{ $cat->title }}
                        </option>
                    @endif
                @endforeach
            </x-form-field>
            <x-message />
            <div class="w-full border-b border-slate-700 mt-4"></div>
            <div class="flex ">
                <button form="delete-form"
                    class="bg-red-500 mt-5 rounded-md cursor-pointer text-white px-16 py-2  hover:bg-red-700 transition">
                    Delete
                </button>
                <div class=" flex justify-end items-center w-full">

                    <a href="/admin/posts" class="font-semibold mr-8 mt-4 text-white hover:underline">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 mt-5 rounded-md text-white px-16 py-2  hover:bg-blue-700 transition">Update</button>
                </div>
            </div>
        </form>
        <form method="POST" action="/admin/posts/{{ $post->id }}" class="hidden" id="delete-form">
            @csrf
            @method('DELETE')
        </form>

    </div>
</x-admin_layout>
