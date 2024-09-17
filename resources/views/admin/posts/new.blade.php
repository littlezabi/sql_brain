<x-admin_layout>
    <x-slot:pageTitle>New Post</x-slot:pageTitle>
    <div class="w-full flex mt-10">
        <form action="/admin/posts/new" method="POST" class="w-full flex flex-col">
            @csrf
            <h1 class="text-2xl mt-2 mb-4 font-bold uppercase ">New post</h1>

            <x-form-field required='false' for="title" title="Enter your title text"
                placeholder="e.g. Introduction to MySQL" />

            <x-form-field style="width: 480px" type='textarea' for="body" title="Descriptive text"
                placeholder="Your post body" />

            <x-form-field style="width: 480px" type="select" for="category" title="Select category">
                <option value="" selected disabled>Select a category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->title }}
                    </option>
                @endforeach
            </x-form-field>

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
