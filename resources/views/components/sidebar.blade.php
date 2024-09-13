<div class="bg-color2 border border-white border-opacity-15 p-6 rounded-md mt-16 fixed" style="width: 400px;height:85vh;">
    <div class="overflow-y-scroll w-full h-full"l>
        @foreach ($categories as $cat)
            <ul class="mb-7">
                <h2
                    class="text-xl mb-1 font-semibold {{ $cat->slug == $item->category->slug ? 'text-white' : 'text-slate-200' }}">
                    {{ $cat->title }}</h2>
                <div class="ml-3">
                    @foreach ($cat->posts as $post)
                        <a href="/{{ $cat->slug }}/{{ $post->slug }}"
                            id="{{ $post->slug == $item->slug ? 'scroll-to' : '' }}"
                            class="{{ $post->slug == $item->slug ? 'text-white underline font-semibold' : '' }} text-sm block my-2 transition-colors text-slate-300  hover:text-white hover:underline">

                            {{ $post->title }}
                        </a>
                    @endforeach
                </div>
            </ul>
        @endforeach
    </div>
</div>
