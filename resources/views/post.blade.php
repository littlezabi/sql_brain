<x-layout>
    <x-slot:pageTitle>
        {{ $item->title }}
    </x-slot:pageTitle>
    @php
        $parsedown = new Parsedown();
    @endphp
    <div class="mt-5 w-full flex justify-between text-white mb-8 relative">
        @include('components.sidebar', ['categories' => $categories])
        <div></div>
        <div class="mt-24 rounded-md mr-3 ml-20" style="width: 65%">
            <section class="px-5">
                <h1 class="text-6xl font-bold" style="line-height:1.3">{{ $item->title }}</h1>
                <div class="tags my-4">
                    <span class="bg-green-500 px-1 py-1 mr-1 capitalize rounded text-sm">mysql</span>
                    <span class="bg-green-500 px-1 py-1 mr-1 capitalize rounded text-sm">mysql</span>
                </div>
                <div class="bg-color2 p-4 rounded-lg" id="post_body">
                    {!! $parsedown->text($item->body) !!}
                </div>
                <div>
                    <h1 class="mt-3">Just try here 😒</h1>
                    <textarea id="sql-editor"></textarea>
                    <button
                        class="rounded-md bg-indigo-600 px-12 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Run code 🚀
                    </button>
                    <div>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl mb-2 mt-8">Related Topics</h2>
                    <ul>

                        @foreach ($related as $item)
                            <li>

                                <a href="#"
                                    class="ml-3 text-slate-300 hover:text-white hover:underline transition">how
                                    to
                                    {{ $item->title }}</a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>
</x-layout>
<script></script>
